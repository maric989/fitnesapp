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

        dd($coaches);
    }

    public function createCoach()
    {
        return view('admin.coach.create');
    }

    public function storeCoach(CoachStoreRequest $request, FileService $fileService)
    {
        $coach = $this->facade->createCoach($request);
        $profilePicture = $fileService->addCoachProfileImage($coach, $request->profile_picture);
        $this->facade->updateCoachProfilePicture($coach, $profilePicture);

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
