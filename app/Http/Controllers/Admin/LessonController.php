<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Models\Lesson;
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

        return view('admin.lesson.paginate')->with([
            'lessons' => $lessons
        ]);
    }

    public function createLesson(Request $request)
    {
        $program = null;
        $programs = null;
        $freeDays = null;
        $backRouteName = 'admin.lessons.paginate';
        $backRouteParam = null;

        if($request->has('program_id')) {
            $program = Program::where('id', $request->get('program_id'))->first();
            $freeDays = ProgramLessonDay::programFreeDays($program->id)->pluck('day')->toArray();
            $backRouteName = 'admin.program.get.single';
            $backRouteParam = $program->id;
        } else {
            $programs = Program::all();
        }

        $intensities = $this->facade->getIntensity();
        $difficulties = $this->facade->getDifficulty();
        $coaches = $this->facade->getCoaches();

        return view('admin.lesson.manage')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => json_encode($freeDays),
            'program' => $program,
            'programs' => $programs,
            'coaches' => $coaches,
            'manage_title' => 'Create Lesson',
            'action_route' => 'admin.lesson.store',
            'back_route_name' => $backRouteName,
            'back_route_param' => $backRouteParam,
            'action_route_params' => null,
        ]);
    }

    public function storeLesson(LessonStoreRequest $request, FileService $fileService)
    {
        $lesson = $this->facade->storeLesson($request);
        $coverImage = $fileService->addLessonCoverImage($lesson, $request->cover_image);
        $this->facade->updateLessonCoverImage($lesson, $coverImage);

        if ($request->has('program_id') && !empty($request->program_id)) {
            ProgramLessonDay::where('program_id', $request->program_id)->where('day', $request->day)->update([
                'lesson_id' => $lesson->id
            ]);
            $returnRoute = route('admin.program.get.single', ['program_id' => $request->program_id]);
        } else {
            $returnRoute = route('admin.lessons.paginate');
        }

        return redirect($returnRoute);
    }

    public function editLesson(int $lessonId)
    {
        $program = null;
        $freeDays = null;
        $backRouteName = 'admin.lessons.paginate';
        $backRouteParam = null;

        $intensities = $this->facade->getIntensity();
        $difficulties = $this->facade->getDifficulty();
        $coaches = $this->facade->getCoaches();

        $lesson = Lesson::where('id', $lessonId)->with(['coverImage'])->first();

        return view('admin.lesson.manage')->with([
            'intensities' => $intensities,
            'difficulties' => $difficulties,
            'days' => json_encode($freeDays),
            'program' => $program,
            'programs' => null,
            'coaches' => $coaches,
            'manage_title' => 'Update Lesson',
            'action_route' => 'admin.lesson.update',
            'action_route_params' => ['lesson_id' => $lesson->id],
            'back_route_name' => $backRouteName,
            'back_route_param' => $backRouteParam,
            'lesson' => $lesson,
        ]);
    }

    public function updateLesson(int $lessonId, LessonUpdateRequest $request, FileService $fileService)
    {
        $lesson = Lesson::where('id', '=', $lessonId)->first();
        $lesson->update([
            'title' => $request->title,
            'video_id' => $request->video_id,
            'coach_id' => $request->coach_id,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'intensity_id' => $request->intensity_id,
            'difficulty_id' => $request->difficulty_id
        ]);

        if ($request->has('cover_image')) {
            $lesson->update([
                'cover_image_id' => null
            ]);
            $coverImage = $fileService->updateLessonCoverImage($lesson, $request->cover_image);
            $this->facade->updateLessonCoverImage($lesson, $coverImage);
        }

        return back();
    }
}
