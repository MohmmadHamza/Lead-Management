<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PriorityRequest extends FormRequest
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
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'name' => 'required|string|max:255',
            'sequence_number' => 'required|integer|min:1',
            'color' => 'required|string|in:badge-primary,badge-secondary,badge-success,badge-danger,badge-info,badge-light,badge-dark',
            'status' => 'required|boolean|in:0,1',
            'company_id' => 'nullable|exists:company,id',
        ];
    }
}
