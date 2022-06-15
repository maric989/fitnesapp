<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramStoreRequest;
use App\Models\Difficulty;
use App\Models\Focus;
use App\Models\Intensity;
use App\Models\Program;
use App\Models\ProgramLessonDay;
use App\Services\File\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProgramController extends Controller
{
    public function paginatePrograms(Request $request)
    {
        $view = 'card';
        if (isset($request->view_mode)) {
            Cookie::queue('view_mode', $request->view_mode, 60*60*30);
            $view = $request->view_mode;
        } else if ($request->cookie('view_mode')) {
            $view = $request->cookie('view_mode');
        }

        return view('admin.program.paginate', ['programs' => Program::paginate(), 'view' => $view]);
    }

    public function createProgram()
    {
        $focuses = Focus::all();
        $intensities = Intensity::all();
        $difficulties = Difficulty::all();

        return view('admin.program.manage')->with([
            'focuses' => $focuses,
            'intensities' => $intensities,
            'difficulties' => $difficulties
        ]);
    }

    public function storeProgram(ProgramStoreRequest $request, FileService $fileService)
    {
        $program = Program::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'trailer_id' => $request->trailer_id,
            'duration' => $request->duration,
            'difficulty_id' => $request->difficulty_id,
            'focus_id' => $request->focus_id,
            'intensity_id' => $request->intensity_id
        ]);

        $coverImage = $fileService->addProgramCoverImage($program, $request->cover_image);
        $program->update([
            'cover_id' => $coverImage->id
        ]);

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
        $program = Program::whereId($programId)->programData()->first();
        //lessions

        // single program blade
    }

    public function editProgram(int $programId)
    {
        $program = Program::whereId($programId)->programData()->first();

        // edit program blade
    }

    public function updateProgram()
    {

    }
}
