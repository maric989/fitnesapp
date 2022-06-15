<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonStoreRequest;
use App\Models\Difficulty;
use App\Models\Intensity;
use App\Models\Lesson;
use App\Models\Program;
use App\Services\File\FileService;

class LessonController extends Controller
{
    public function createLesson(int $programId)
    {
        $program = Program::where('id', $programId)->first();
        $intensities = Intensity::all();
        $difficulties = Difficulty::all();
        $freeDays = [1,2,3,4,5];

        return view('lesson.create')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => $freeDays,
            'program' => $program
        ]);
    }

    public function storeLesson(int $programId, LessonStoreRequest $request, FileService $fileService)
    {
        $lesson = Lesson::create([
            'program_id' => $programId,
            'title' => $request->title,
            'video_id' => $request->video_id,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'intensity_id' => $request->intensity_id,
            'difficulty_id' => $request->difficulty_id
        ]);

        $coverImage = $fileService->addLessonCoverImage($lesson, $request->cover_image);
        $lesson->update([
            'cover_image_id' => $coverImage->id
        ]);


    }
}
