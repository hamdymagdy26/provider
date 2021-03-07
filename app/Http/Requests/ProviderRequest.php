<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractRequest;
use App\Utility\ProviderStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class ProviderRequest
 * @package App\Http\Requests
 */
class ProviderRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
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