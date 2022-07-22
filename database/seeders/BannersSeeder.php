<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Enum\Banner\BannerTypeEnum;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'type' => BannerTypeEnum::FRONTPAGE_BANNER,
            'data' => [
                'banner_subtext_left' => 'left banner text',
                'banner_subtext_right' => 'right Banner text'
            ]
        ]);

        Banner::create([
            'type' => BannerTypeEnum::FOOTER_CTA_BANNER,
            'data' => [
                'headline_text' => 'headline text test',
                'body_text' => 'body textsss',
                'button_text' => 'click here',
                'button_link' => 'www.google.com'
            ]
        ]);
    }
}
