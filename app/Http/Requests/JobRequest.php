<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'experience' => 'required|in:' . implode(',', Job::$experiences),
            'category' => 'required|in:' . implode(',', Job::$category),
            'title' => 'required|string|min:3|max:256',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'description' => 'required|string',
        ];
    }
}
