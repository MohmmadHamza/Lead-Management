<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user')?->id ?? null;

        return [
            'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                $isUpdate ? "unique:users,email,{$userId}" : 'unique:users,email',
            ],
            'password' => $isUpdate ? 'nullable|min:8' : 'required|min:8',
            'confirm_password' => $isUpdate ? 'nullable|same:password' : 'required|same:password',
            'permissions' => 'nullable|array',
            'permissions.*' => 'array', 
            'permissions.*.manage' => 'nullable|in:0,1',
            'permissions.*.view' => 'nullable|in:0,1',
            'permissions.*.create' => 'nullable|in:0,1',
            'permissions.*.edit' => 'nullable|in:0,1',
            'permissions.*.update' => 'nullable|in:0,1',
            'permissions.*.delete' => 'nullable|in:0,1',
            'status' => 'nullable|in:0,1',
            'role' => 'nullable',
            'company_id' => 'nullable',
            'mobile' => 'required|numeric|digits:10',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'landmark' => 'nullable|string',
            'pin_code' => 'nullable|numeric|digits:6',
            'state' => 'nullable|exists:states,id',
            'city' => 'nullable|exists:cities,id',
            'photo' => 'nullable|image|max:2048',


        ];

    }
}
