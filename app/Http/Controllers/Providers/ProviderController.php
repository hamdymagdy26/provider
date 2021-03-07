<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Services\Providers\ProviderServiceInterface;
use Illuminate\Http\JsonResponse;
use App\Entities\Providers\ProviderEntity;
use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{
    /** @var ProviderServiceInterface */
    private $ProviderServiceInterface;

    /** @var ProviderEntity */
    private $ProviderEntity;

    /**
     * ProviderController constructor.
     * @param ProviderServiceInterface $ProviderServiceInterface
     * @param ProviderEntity $ProviderEntity
     */
    public function __construct(
        ProviderServiceInterface $ProviderServiceInterface,
        ProviderEntity $ProviderEntity
    )
    {
        $this->ProviderServiceInterface = $ProviderServiceInterface;
        $this->ProviderEntity = $ProviderEntity;
    }

    /**
     * @return mixed
     */
    public function getContent(ProviderRequest $request): JsonResponse
    {
        $filter = $this->ProviderEntity
            ->setProvider($request->get('provider'))
            ->setStatus($request->get('statusCode'))
            ->setMin($request->get('balanceMin'))
            ->setMax($request->get('balanceMax'))
            ->setCurrency($request->get('currency'));

        return $this->ProviderServiceInterface->getContent($filter);
    }
}
