<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramAddLessonStoreRequest;
use App\Http\Requests\ProgramsListFilterRequest;
use App\Http\Requests\ProgramStoreRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\Program;
use App\Models\ProgramLessonDay;
use App\Services\File\FileService;
use App\Services\Program\Facade\AdminProgramFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProgramController extends Controller
{
    private AdminProgramFacade $facade;

    public function __construct(AdminProgramFacade $adminProgramFacade)
    {
        $this->facade = $adminProgramFacade;
    }

    public function paginatePrograms(ProgramsListFilterRequest $request)
    {
        $view = 'card';
        if (isset($request->view_mode)) {
            Cookie::queue('view_mode', $request->view_mode, 60*60*30);
            $view = $request->view_mode;
        } else if ($request->cookie('view_mode')) {
            $view = $request->cookie('view_mode');
        }
        $programs = $this->facade->getListPaginated($request->validated());

        return view('admin.program.paginate', ['programs' => $programs, 'view' => $view]);
    }

    public function createProgram()
    {
        $focuses = $this->facade->getFocuses();
        $intensities = $this->facade->getIntensity();
        $difficulties = $this->facade->getDifficulty();

        return view('admin.program.manage')->with([
            'manage_title' => 'Create Program',
            'action_route' => 'admin.program.store',
            'action_route_params' => null,
            'focuses' => $focuses,
            'intensities' => $intensities,
            'difficulties' => $difficulties
        ]);
    }

    public function storeProgram(ProgramStoreRequest $request, FileService $fileService)
    {
        $program = $this->facade->createProgram($request);
        $coverImage = $fileService->addProgramCoverImage($program, $request->cover_image);
        $this->facade->updateProgramCoverImage($program, $coverImage);

        $programDays = [];
        for ($i = 1; $i <= $request->duration; $i++) {
            $programDays[] = [
                'program_id' => $program->id,
                'day' => $i
            ];
        }
        ProgramLessonDay::insert($programDays);

        return redirect()->route('admin.program.get.single', $program->id);
    }

    public function getProgram(int $programId)
    {
        return view('admin.program.view')->with([
            'program' => $this->facade->getProgramWithData($programId)
        ]);
    }

    public function editProgram(int $programId)
    {
        $program = Program::whereId($programId)->with(['coverPhoto'])->first();

        $focuses = $this->facade->getFocuses();
        $intensities = $this->facade->getIntensity();
        $difficulties = $this->facade->getDifficulty();

        return view('admin.program.manage')->with([
            'manage_title' => 'Edit Program',
            'action_route' => 'admin.program.update.single',
            'action_route_params' => ['program_id' => $program->id],
            'focuses' => $focuses,
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'program' => $program,
        ]);
    }

    public function updateProgram(int $programId, ProgramUpdateRequest $request, FileService $fileService)
    {
        $program = Program::find($programId);
        $program->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'trailer_id' => $request->trailer_id,
            'duration' => $request->duration,
            'difficulty_id' => $request->difficulty_id,
            'focus_id' => $request->focus_id,
            'intensity_id' => $request->intensity_id
        ]);

        if ($request->has('cover_image')) {
            $program->update([
                'cover_id' => null
            ]);
            $coverImage = $fileService->updateProgramCoverImage($program, $request->cover_image);
            $this->facade->updateProgramCoverImage($program, $coverImage);
        }

        return back();
    }

    public function addLesson(int $programId)
    {
        $program = Program::find($programId);
        $availableLesson = $this->facade->getAvailableLesson($program);
        $freeDays = ProgramLessonDay::programFreeDays($program->id)->pluck('day')->toArray();

        return view('admin.program.add-lessons')->with([
            'program' => $program,
            'lessons' => $availableLesson,
            'free_days' => json_encode($freeDays),
        ]);
    }

    public function storeLesson(ProgramAddLessonStoreRequest $request, int $programId)
    {
        ProgramLessonDay::where('program_id', $programId)
            ->where('day', $request->day)
            ->update([
                'lesson_id' => $request->lesson_id,
            ]);

        return back();
    }
}
