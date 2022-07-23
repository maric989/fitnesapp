<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $first_name
 * @property string $last_name
 * @property $profile_picture
 * @property string $about
 * @property integer $experience
 * @property string $bio
 */
class CoachUpdateRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'profile_picture' => ['nullable'],
            'about' => ['required'],
            'experience' => ['required'],
            'bio' => ['required']
        ];
    }
}
