<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $title
 * @property $focus_id
 * @property $intensity_id
 * @property $difficulty_id
 * @property $short_description
 * @property $full_description
 * @property $duration
 * @property $trailer_id
 * @property $cover_image
 */
class ProgramUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:50'],
            'focus_id' => ['required', 'exists:focuses,id'],
            'intensity_id' => ['required', 'exists:intensities,id'],
            'difficulty_id' => ['required', 'exists:difficulties,id'],
            'short_description' => ['nullable'],
            'full_description' => ['required'],
            'duration' => ['required'],
            'trailer_id' => ['required', 'string'],
            'cover_image' => ['nullable','mimes:jpg,jpeg','max:2048'],
        ];
    }
}
