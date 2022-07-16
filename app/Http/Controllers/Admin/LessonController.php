<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonStoreRequest;
use App\Models\Program;
use App\Models\ProgramLessonDay;
use App\Services\File\FileService;
use App\Services\Lesson\Facade\AdminLessonFacade;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private AdminLessonFacade $facade;

    public function __construct(AdminLessonFacade $adminLessonFacade)
    {
        $this->facade = $adminLessonFacade;
    }

    public function paginateLessons()
    {
        $lessons = $this->facade->getListPaginated();

        dd($lessons);
    }

    public function createLesson(Request $request)
    {
        $program = null;
        $freeDays = null;

        if($request->has('program_id')) {
            $program = Program::where('id', $request->get('program_id'))->first();
            $freeDays = ProgramLessonDay::programFreeDays($program->id)->pluck('day')->toArray();
        }

        $intensities = $this->facade->getIntensity();
        $difficulties = $this->facade->getDifficulty();
        $coaches = $this->facade->getCoaches();

        return view('admin.lesson.manage')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => json_encode($freeDays),
            'program' => $program,
            'coaches' => $coaches,
            'manage_title' => 'Create Lesson',
            'action_route' => 'admin.lesson.store'
        ]);
    }

    public function storeLesson(LessonStoreRequest $request, FileService $fileService)
    {
        $lesson = $this->facade->storeLesson($request);
        $coverImage = $fileService->addLessonCoverImage($lesson, $request->cover_image);
        $this->facade->updateLessonCoverImage($lesson, $coverImage);

        if ($request->has('program_id')) {
            ProgramLessonDay::where('program_id', $request->program_id)->where('day', $request->day)->update([
                'lesson_id' => $lesson->id
            ]);
            $returnRoute = route('admin.program.get.single', ['program_id' => $request->program_id]);
        } else {
            $returnRoute = route('admin.lesson.paginate');
        }

        return redirect($returnRoute);
    }
}
