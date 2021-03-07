<?php

namespace App\Repositories\Providers;

class ProviderRepository implements ProviderRepositoryInterface
{
    /**
     * @param string $provider
     * @return mixed
     */
    public function getContent(string $provider)
    {
        $file = storage_path('app/public/' . $provider . '/' . $provider . '.json');
        $content = file_get_contents($file);
        return json_decode($content, true);
    }
}
