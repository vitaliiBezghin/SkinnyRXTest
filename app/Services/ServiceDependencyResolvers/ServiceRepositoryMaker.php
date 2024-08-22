<?php

namespace App\Services\ServiceDependencyResolvers;

class ServiceRepositoryMaker
{
    public function make(string $abstraction)
    {
       return app($abstraction);
    }
}
