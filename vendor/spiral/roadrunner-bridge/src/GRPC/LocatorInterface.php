<?php

declare(strict_types=1);

namespace Spiral\RoadRunnerBridge\GRPC;

interface LocatorInterface
{
    /**
     * Return list of available GRPC services in a form of [interface => object].
     */
    public function getServices(): array;
}
