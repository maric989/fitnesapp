<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachStoreRequest;
use App\Models\Coach;
use App\Services\File\FileService;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function paginateCoaches()
    {
        $coaches = Coach::paginate();

        dd($coaches);
    }

    public function createCoach()
    {
        return view('admin.coach.create');
    }

    public function storeCoach(CoachStoreRequest $request, FileService $fileService)
    {
        $coach = Coach::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'about' => $request->about,
            'experience' => $request->experience,
            'bio' => $request->bio,
        ]);

        $profilePicture = $fileService->addCoachProfileImage($coach, $request->profile_picture);
        $coach->update([
            'profile_picture_id' => $profilePicture->id
        ]);

        return redirect(route('admin.coach.single', $coach->id));
    }

    public function getCoach(Coach $coach)
    {
        return view()->with([
            'coach' => $coach
        ]);
    }

    public function editCoach(Coach $coach)
    {
        return view()->with([
            'coach' => $coach
        ]);
    }

    public function updateCoach(Coach $coach, Request $request)
    {

    }
}
