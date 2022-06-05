<?php

namespace App\Modules\Shared\Model;

use App\Exceptions\ExpectedException;
use ReflectionClass;

class MarcheEnum
{
    /**
     * @var mixed
     */
    protected mixed $value;

    /**
     * @param mixed $value
     * @throws ExpectedException
     */
    public function __construct(mixed $value)
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getConstants() as $val) {
            if ($value == $val) {
                $this->value = $value;
            }
        }
        $class_name  = explode('\\', $reflection->name);
        $class_name = $class_name[count($class_name) - 1];
        if (!isset($this->value)) {
            throw new ExpectedException("Invalid $class_name enum type!", 1000);
        }
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function valueIs(mixed $value): bool
    {
        return $this->value == $value;
    }
}
