<?php

namespace App\Http\Requests\Company;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string','min:3', 'max:255'],
            'email' => ['email', 'max:255'],
            'logo' => ['nullable','image','dimensions:max_width=100,max_height=100','mimetypes:image/jpeg,image/png'],
        ];
    }
}
