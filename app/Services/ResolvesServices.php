<?php

namespace App\Services;

trait ResolvesServices
{
    protected function getService(string $method)
    {
        return app(ServiceResolver::class)->resolveService($this, $method);
    }
}
