<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachStoreRequest;
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

    public function paginateCoaches()
    {
        $coaches = $this->facade->getListPaginated();

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

        return redirect(route('admin.coach.single', $coach->id));
    }

    public function editCoach(int $coachId)
    {
        $coach = Coach::where('id', $coachId)->first();

        return view('admin.coach.edit')->with([
            'coach' => $coach,
            'manage_title' => 'Edit Coach',
            'action_route' => 'admin.coach.edit',

        ]);
    }

    public function updateCoach(Coach $coach, Request $request)
    {

    }
}
