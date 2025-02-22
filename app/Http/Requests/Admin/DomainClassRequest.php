<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DomainClassRequest extends FormRequest
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
        $domainClassId = $this->route('domain_class')?->id ?? null;

        return [
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean|in:0,1',
            'fees' => 'required',
            'sequence_number' => 'required|integer|min:1',
            'color' => 'required|string|in:badge-primary,badge-secondary,badge-success,badge-danger,badge-info,badge-light,badge-dark',
            'company_id' => 'nullable|exists:company,id',
        ];
    }
}
