<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function editBanners()
    {
        $banners = Banner::all();
        $bannersData = [];
        foreach ($banners as $banner) {
            $bannersData[$banner->type] = $banner->data;
        }

        return view('admin.settings.banner-edit')->with([
            'banners' => $bannersData
        ]);
    }

    public function editFilters()
    {
        return view('admin.settings.filters-edit');
    }
}
