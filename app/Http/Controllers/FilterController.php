<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateFiletersRequest;
use App\Services\Filter\AdminFilterFacade;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    private AdminFilterFacade $facade;

    public function __construct(AdminFilterFacade $adminFilterFacade)
    {
        $this->facade = $adminFilterFacade;
    }

    public function editFilters()
    {
        $focuses = $this->facade->getFocuses();
        $difficulties = $this->facade->getDifficulty();
        $intensities = $this->facade->getIntensity();

        return view('admin.filters.edit')->with([
            'focuses' => $focuses,
            'difficulties' => $difficulties,
            'intensities' => $intensities
        ]);
     }

    public function updateFilters(AdminUpdateFiletersRequest $request)
    {
        dd($request);
     }
}
