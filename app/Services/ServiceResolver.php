<?php

namespace App\Services;

use App\Exceptions\ServiceNotFoundException;
use Illuminate\Support\Str;

class ServiceResolver
{
    public function resolveService($controller, string $method)
    {
        $controllerName = class_basename($controller);
        $resourceName = Str::before($controllerName, 'Controller');
        // Remove any namespace from the method name
        $methodName = Str::afterLast($method, '::');
        $serviceName = "App\\Services\\{$resourceName}\\{$resourceName}" . Str::studly($methodName) . "Service";

        if(class_exists($serviceName)) {
            return app($serviceName);
        }

        throw new ServiceNotFoundException("Service not found: {$serviceName}");
    }
}
