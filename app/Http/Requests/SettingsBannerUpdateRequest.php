<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $footer_headline_text
 * @property string $footer_body_text
 * @property string $footer_button_text
 * @property string $footer_button_link
 * @property string $frontpage_banner_subtext_left
 * @property string $frontpage_banner_subtext_right
 */
class SettingsBannerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'footer_headline_text' => ['required'],
            'footer_body_text' => ['required'],
            'footer_button_text' => ['required'],
            'footer_button_link' => ['required'],
            'frontpage_banner_subtext_left' => ['required'],
            'frontpage_banner_subtext_right' => ['required'],
        ];
    }
}
