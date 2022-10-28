<?php

namespace App\Http\Requests;

use App\Constants\AccountType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'type' => ['required', 'string', Rule::in([
                AccountType::BANK,
                AccountType::CASH,
                AccountType::CHECKING,
                AccountType::CREDIT,
                AccountType::EWALLET,
                AccountType::INVESTMENT,
                AccountType::LOAN,
                AccountType::OTHER,
                AccountType::SAVINGS,
            ])],
            'description' => 'nullable|string',
        ];
    }
}
