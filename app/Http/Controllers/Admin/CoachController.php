<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachListFilterRequest;
use App\Http\Requests\CoachStoreRequest;
use App\Http\Requests\CoachUpdateRequest;
use App\Models\Coach;
use App\Services\Coach\Facade\AdminCoachFacade;
use App\Services\File\FileService;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    private AdminCoachFacade $facade;

    public function __construct(AdminCoachFacade $adminCoachFacade)
    {
        $this->facade = $adminCoachFacade;
    }

    public function paginateCoaches(CoachListFilterRequest $request)
    {
        $coaches = $this->facade->getListPaginated($request->validated());

        return view('admin.coach.paginate')->with([
            'coaches' => $coaches
        ]);
    }

    public function createCoach()
    {
        return view('admin.coach.create')->with([
            'manage_title' => 'Create Coach',
            'action_route' => 'admin.coach.store'
        ]);
    }

    public function storeCoach(CoachStoreRequest $request, FileService $fileService)
    {
        $coach = $this->facade->createCoach($request);
        $profilePicture = $fileService->addCoachProfileImage($coach, $request->profile_picture);
        $this->facade->updateCoachProfilePicture($coach, $profilePicture);

        return redirect(route('admin.coach.edit', $coach->id));
    }

    public function editCoach(int $coachId)
    {
        $coach = Coach::where('id', $coachId)->first();

        return view('admin.coach.edit')->with([
            'coach' => $coach,
            'manage_title' => 'Edit Coach',
            'action_route' => 'admin.coach.update',
        ]);
    }

    public function updateCoach(int $coachId, CoachUpdateRequest $request, FileService $fileService)
    {
        $coach = Coach::find($coachId);
        $coach->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'about' => $request->about,
            'experience' => $request->experience,
            'bio' => $request->bio
        ]);

        if ($request->has('profile_picture')) {
            $coach->update([
                'profile_picture_id' => null
            ]);
            $profilePicture = $fileService->updateCoachProfileImage($coach, $request->profile_picture);
            $coach->update([
                'profile_picture_id' => $profilePicture->id
            ]);
        }

        return back();
    }
}
