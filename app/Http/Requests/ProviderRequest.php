<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractRequest;
use App\Utility\ProviderStatus;
use Illuminate\Validation\Rule;

/**
 * Class ProviderRequest
 * @package App\Http\Requests
 */
class ProviderRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'sometimes|string',
            'balanceMin' => 'sometimes|numeric',
            'balanceMax' => 'sometimes|numeric|gt:balanceMin',
            'statusCode' => [
                'sometimes',
                Rule::in(ProviderStatus::providerStatus())
            ],
        ];
    }
}