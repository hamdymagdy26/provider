<?php

namespace App\Repositories\Providers;

interface ProviderRepositoryInterface
{
    /**
     * @param string $provider
     * @return mixed
     */
    public function getContent(string $provider);
}
