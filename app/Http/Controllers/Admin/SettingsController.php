<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsBannerUpdateRequest;
use App\Models\Banner;
use App\Models\Enum\Banner\BannerTypeEnum;

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

    public function updateBanners(SettingsBannerUpdateRequest $request)
    {
        $footerBannerData = [
            'headline_text' => $request->footer_headline_text,
            'body_text' => $request->footer_body_text,
            'button_text' => $request->footer_button_text,
            'button_link' => $request->footer_button_link
        ];

        $frontpageBannerData = [
            'banner_subtext_left' => $request->frontpage_banner_subtext_left,
            'banner_subtext_right' => $request->frontpage_banner_subtext_right
        ];

        Banner::where('type', BannerTypeEnum::FOOTER_CTA_BANNER)
            ->update([
                'data' => $footerBannerData
        ]);

        Banner::where('type', BannerTypeEnum::FRONTPAGE_BANNER)
            ->update([
                'data' => $frontpageBannerData
        ]);

        return back();
    }

    public function editFilters()
    {
        return view('admin.settings.filters-edit');
    }
}
