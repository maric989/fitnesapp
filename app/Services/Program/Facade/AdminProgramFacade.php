<?php

namespace App\Services\Program\Facade;

use App\Http\Requests\ProgramStoreRequest;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Program;
use App\Models\ProgramLessonDay;
use App\Services\AbstractAdminFacade;
use App\Services\AdminFacadeInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminProgramFacade extends AbstractAdminFacade implements AdminFacadeInterface
{
    const PROGRAMS_PER_PAGE_ADMIN = 10;

    public function getListPaginated(?array $filters): LengthAwarePaginator
    {
        $programs = Program::programData();

        if (isset($filters['s'])) {
            $programs = $programs->where('title', 'LIKE', '%' . $filters['s'] . '%');
        }
        if (isset($filters['focus_id'])) {
            $programs = $programs->where('focus_id', $filters['focus_id']);
        }

        if (isset($filters['difficulty_id'])) {
            $programs = $programs->where('difficulty_id', $filters['difficulty_id']);
        }

        if (isset($filters['intensity_id'])) {
            $programs = $programs->where('intensity_id', $filters['intensity_id']);
        }

        return $programs->paginate(self::PROGRAMS_PER_PAGE_ADMIN);
    }

    public function createProgram(ProgramStoreRequest $request): Program
    {
        return Program::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'trailer_id' => $request->trailer_id,
            'duration' => $request->duration,
            'difficulty_id' => $request->difficulty_id,
            'focus_id' => $request->focus_id,
            'intensity_id' => $request->intensity_id
        ]);
    }

    public function updateProgramCoverImage(Program $program, File $coverImage): void
    {
        $program->update([
            'cover_id' => $coverImage->id
        ]);
    }

    public function getAvailableLesson(Program $program): LengthAwarePaginator
    {
        $takenLessons = ProgramLessonDay::where('program_id', $program->id)
            ->whereNotNull('lesson_id')
            ->pluck('lesson_id')
            ->toArray();

        return Lesson::whereNotIn('id', $takenLessons)->paginate();
    }

    public function getProgramWithData(int $programId)
    {
        return Program::whereId($programId)->with('lessons')->programData()->first();
    }
}
