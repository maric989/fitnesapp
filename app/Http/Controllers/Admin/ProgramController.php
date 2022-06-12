<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramStoreRequest;
use App\Models\Difficulty;
use App\Models\Focus;
use App\Models\Intensity;
use App\Models\Program;
use App\Services\File\FileService;

class ProgramController extends Controller
{
    public function createProgram()
    {
        $focuses = Focus::all();
        $intensities = Intensity::all();
        $difficulties = Difficulty::all();

        return view('programs.create')->with([
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

        return redirect()->route('admin.program.get.single', $program->id);
    }

    public function getProgram($programId)
    {
        $program = Program::whereId($programId)->programData()->first();

        dd($program);
    }
}
