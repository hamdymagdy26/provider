<?php

namespace App\Services\Providers;

use App\Entities\Providers\ProviderEntity;

interface ProviderServiceInterface
{
    /**
     * @param ProviderEntity $filter
     * @return mixed
     */
    public function getContent(ProviderEntity $filter);
}
