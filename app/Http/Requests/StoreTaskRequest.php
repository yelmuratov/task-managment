<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        'category_id' => 'required|exists:categories,id',
        'area_id' => 'required|array',
        'area_id.*' => 'exists:areas,id',
        'performer' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB file size limit
        'period' => 'required|date',   
        ];
    }
}