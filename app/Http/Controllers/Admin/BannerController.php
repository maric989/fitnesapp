<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function editBanners()
    {
        $banners = Banner::all();
        $bannersData = [];
        foreach ($banners as $banner) {
            $bannersData[$banner->type] = $banner->data;
        }

        return view('admin.banners.edit')->with([
            'banners' => $bannersData
        ]);
    }
}
