<?php

namespace App\Http\Requests\Worker;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkerUpdateRequest extends FormRequest
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
            'phone' => ['nullable','regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            'company_id'=>['nullable','exists:App\Models\Company,id']
        ];
    }
}
