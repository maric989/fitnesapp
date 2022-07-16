<?php

namespace App\Services\Program;

use App\Http\Requests\ProgramStoreRequest;
use App\Models\File;
use App\Models\Program;
use App\Services\AbstractAdminFacade;
use App\Services\AdminFacadeInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminProgramFacade extends AbstractAdminFacade implements AdminFacadeInterface
{
    const PROGRAMS_PER_PAGE_ADMIN = 10;

    public function getListPaginated(): LengthAwarePaginator
    {
        return Program::programData()->paginate(self::PROGRAMS_PER_PAGE_ADMIN);
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
}
