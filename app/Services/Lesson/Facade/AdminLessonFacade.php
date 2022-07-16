<?php

namespace App\Services\Lesson\Facade;

use App\Http\Requests\LessonStoreRequest;
use App\Models\File;
use App\Models\Lesson;
use App\Services\AbstractAdminFacade;
use App\Services\AdminFacadeInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminLessonFacade extends AbstractAdminFacade implements AdminFacadeInterface
{
    public function getListPaginated(): LengthAwarePaginator
    {
        return Lesson::with('programs')->paginate();
    }

    public function storeLesson(LessonStoreRequest $request)
    {
        return Lesson::create([
            'title' => $request->title,
            'video_id' => $request->video_id,
            'coach_id' => $request->coach_id,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'intensity_id' => $request->intensity_id,
            'difficulty_id' => $request->difficulty_id
        ]);
    }

    public function updateLessonCoverImage(Lesson $lesson, File $file)
    {
        $lesson->update([
            'cover_image_id' => $file->id
        ]);
    }
}
