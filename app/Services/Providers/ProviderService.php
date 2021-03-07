<?php

namespace App\Services\Providers;

use App\Entities\Providers\ProviderEntity;
use App\Repositories\Providers\ProviderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Storage;

class ProviderService implements ProviderServiceInterface
{
    protected $providers = [
        'DataProviderX' => [
            'parentAmount' => 'amount',
            'Currency' => 'currency',
            'parentEmail' => 'email',
            'statusCode' => 'status',
            'registerationDate' => 'date',
            'parentIdentification' => 'id'
        ],
        'DataProviderY' => [
            'balance' => 'amount',
            'currency' => 'currency',
            'email' => 'email',
            'status' => 'status',
            'created_at' => 'data',
            'id' => 'id'
        ]
    ];

    protected $statuses = [
        'authorised' => [1, 100],
        'decline' => [2, 200],
        'refunded' => [3, 300]
    ];

    /** @var ProviderRepositoryInterface */
    private $ProviderRepositoryInterface;

    /**
     * ProviderService constructor.
     * @param ProviderRepositoryInterface $ProviderRepositoryInterface
     */
    public function __construct(ProviderRepositoryInterface $ProviderRepositoryInterface)
    {
        $this->ProviderRepositoryInterface = $ProviderRepositoryInterface;
    }

    /**
     * @param ProviderEntity $filter
     * @return JsonResponse
     */
    public function getContent(ProviderEntity $filter): JsonResponse
    {
        $content = collect();

        # filter collection using provider
        if ($provider = $filter->getProvider()) {
            # check if file exists
            if(! Storage::exists('public/'.$filter->getProvider().'/'.$filter->getProvider().'.json')) {
                # return error
                return response()->json([
                    'status' => 'error',
                    'message' => 'No such provider with the name '. $filter->getProvider()
                ]);
            }
            # get single provider
            $content = $content->merge($this->transformProvider($provider));
        } else {
            # get all providers
            collect($this->providers)->each(function ($value, $provider) use (&$content) {
                $content = $content->merge($this->transformProvider($provider));
            });
        }

        # filter collection using currency
        if ($currency = $filter->getCurrency()) {
            $content = $content->where('currency', $currency);
        }

        # filter collection using max amount
        if ($max = $filter->getMax()) {
            $content = $content->where('amount', '<=', $max);
        }

        # filter collection using min amount
        if ($min = $filter->getMin()) {
            $content = $content->where('amount', '>=', $min);
        }

        # filter collection using status
        if ($status = $filter->getStatus()) {
            $content = $content->whereIn('status', $this->statuses[$status]);
        }

        # return success
        return response()->json([
            'status' => 'success',
            'data' => array_values($content->all())
        ]);
    }

    /**
     * @param $provider
     * @return Collection
     */
    public function transformProvider($provider): Collection
    {
        return collect($this->ProviderRepositoryInterface->getContent($provider))->transform(function ($singleObject) use ($provider) {
            $transformedData = collect();
            collect($singleObject)->transform(function ($val, $key) use (&$transformedData, $provider) {
                $transformedData = $transformedData->merge(
                    [$this->providers[$provider][$key] => $val]
                );
            });
            return $transformedData->all();
        });
    }
}
