<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonStoreRequest;
use App\Models\Coach;
use App\Models\Difficulty;
use App\Models\Intensity;
use App\Models\Lesson;
use App\Models\LessonProgram;
use App\Models\Program;
use App\Models\ProgramLessonDay;
use App\Services\File\FileService;

class LessonController extends Controller
{
    public function paginateLessons()
    {
        $lessons = Lesson::with('programs')->paginate();

        dd($lessons);
    }

    public function createLesson(int $programId)
    {
        $program = Program::where('id', $programId)->first();
        $intensities = Intensity::all();
        $difficulties = Difficulty::all();
        $freeDays = ProgramLessonDay::programFreeDays($programId)->pluck('day')->toArray();
        $coaches = Coach::all();

        return view('admin.lesson.manage')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => $freeDays,
            'program' => $program,
            'coaches' => $coaches,
            'manage_title' => 'Create Lesson',
            'action_route' => 'admin.lesson.store',
            'action_route_params' => ['program_id' => $programId],
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
        LessonProgram::create([
            'program_id' => $programId,
            'lesson_id' => $lesson->id
        ]);

        $coverImage = $fileService->addLessonCoverImage($lesson, $request->cover_image);
        $lesson->update([
            'cover_image_id' => $coverImage->id
        ]);
        ProgramLessonDay::where('program_id', $programId)->where('day', $request->day)->update([
            'lesson_id' => $lesson->id
        ]);
    }
}
