<?php

namespace App\Services\Coach\Facade;

use App\Http\Requests\CoachStoreRequest;
use App\Models\Coach;
use App\Models\File;

class AdminCoachFacade
{
    public function getListPaginated()
    {
        return Coach::paginate();
    }

    public function createCoach(CoachStoreRequest $request): Coach
    {
        return Coach::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'about' => $request->about,
            'experience' => $request->experience,
            'bio' => $request->bio,
        ]);
    }

    public function updateCoachProfilePicture(Coach $coach, File $profilePicture): void
    {
        $coach->update([
            'profile_picture_id' => $profilePicture->id
        ]);
    }
}
