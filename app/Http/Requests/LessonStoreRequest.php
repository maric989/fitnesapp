<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $title
 * @property $video_id
 * @property $intensity_id
 * @property $difficulty_id
 * @property $short_description
 * @property $full_description
 * @property $day
 * @property $cover_image
 */
class LessonStoreRequest extends FormRequest
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
            'title' => ['required'],
            'video_id' => ['required', 'string'],
            'intensity_id' => ['required', 'integer'],
            'difficulty_id' => ['required', 'integer'],
            'short_description' => ['nullable'],
            'full_description' => ['required'],
            'day' => ['required', 'integer'],
            'cover_image' => ['required','mimes:jpg,jpeg','max:2048'],
        ];
    }
}