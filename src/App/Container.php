<?php

namespace App;

use RuntimeException;

/**
 * Simple dependency container.
 * 
 * Usually I'd use a proper dependency injector, such as symfony/dependency-injection
 */
final class Container
{
    /**
     * @psalm-var object[]
     */
    private static array $instances = [];

    /**
     * @psalm-param class-string $service
     */
    public static function get(string $service): object
    {
        return self::$instances[$service]
            ?? throw new RuntimeException("Class '$service' is not registered as a Container object.");
    }

    /**
     * @psalm-param class-string $service
     */
    public static function register(string $service, object $instance): void
    {
        if (isset(self::$instances[$service])) {
            throw new RuntimeException("Cannot redeclare an already-defined service '$service'.");
        }

        self::$instances[$service] = $instance;
    }
}
