<?php

namespace App\Models\Enum;

use ReflectionClass;

abstract class Enum
{
    /**
     * Get all of the constants defined on the class.
     *
     * @return array
     * @throws \ReflectionException
     */
    protected static function getConstants(): array
    {
        $calledClass = get_called_class();
        $reflect = new ReflectionClass($calledClass);

        return $reflect->getConstants();
    }

    /**
     * Get all of the enum keys.
     *
     * @return array
     */
    public static function getKeys(): array
    {
        return array_keys(static::getConstants());
    }

    /**
     * Get all of the enum values.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return array_values(static::getConstants());
    }
}
