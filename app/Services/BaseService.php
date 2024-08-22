<?php

namespace App\Services;

use AllowDynamicProperties;
use App\Exceptions\ServiceDependenciesNotResolved;
use ReflectionClass;
use ReflectionProperty;

#[AllowDynamicProperties] abstract class BaseService
{
    const RESOLVABLE = [
        'repository' => 'Repository',
    ];

    /**
     * @throws ServiceDependenciesNotResolved
     */
    public function __construct()
    {
        $this->resolveServiceDependencies();
    }

    /**
     * @throws ServiceDependenciesNotResolved
     */
    protected function resolveServiceDependencies(): void
    {
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $nodeName = self::RESOLVABLE[$property->getName()];
            try {
                $this->{strtolower($nodeName)} = app()->make('App\Services\ServiceDependencyResolvers\Service' . $nodeName . 'Maker')->make($property->getType());
            } catch (\Exception $e) {
                throw new ServiceDependenciesNotResolved("Dependency not resolved: " . $nodeName, $e);
            }
        }
    }
}
