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
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function paginateLessons()
    {
        $lessons = Lesson::with('programs')->paginate();

        dd($lessons);
    }

    public function createLesson(Request $request)
    {
        $program = null;
        $freeDays = null;
        $programId = null;

        if($request->has('program_id')) {
            $program = Program::where('id', $request->get('program_id'))->first();
            $programId = $program->id;
            $freeDays = ProgramLessonDay::programFreeDays($program->id)->pluck('day')->toArray();
        }

        $intensities = Intensity::all();
        $difficulties = Difficulty::all();
        $coaches = Coach::all();

        return view('admin.lesson.manage')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => json_encode($freeDays),
            'program' => $program,
            'coaches' => $coaches,
            'manage_title' => 'Create Lesson',
            'action_route' => 'admin.lesson.store',
            'action_route_params' => ['program_id' => $programId],
        ]);
    }

    public function storeLesson(LessonStoreRequest $request, FileService $fileService)
    {
        $lesson = Lesson::create([
            'title' => $request->title,
            'video_id' => $request->video_id,
            'coach_id' => $request->coach_id,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'intensity_id' => $request->intensity_id,
            'difficulty_id' => $request->difficulty_id
        ]);

        $coverImage = $fileService->addLessonCoverImage($lesson, $request->cover_image);
        $lesson->update([
            'cover_image_id' => $coverImage->id
        ]);

        if ($request->has('program_id')) {
            ProgramLessonDay::where('program_id', $request->program_id)->where('day', $request->day)->update([
                'lesson_id' => $lesson->id
            ]);
        }
    }
}
