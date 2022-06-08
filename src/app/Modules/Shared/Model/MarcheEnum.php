<?php

namespace App\Modules\Shared\Model;

use App\Exceptions\ExpectedException;
use phpDocumentor\Reflection\Types\This;
use ReflectionClass;

class MarcheEnum
{
    /**
     * @var mixed
     */
    protected $value;
    protected $reflection;

    /**
     * @param mixed $value
     * @throws ExpectedException
     */
    public function __construct($value)
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getConstants() as $val) {
            if ($value == $val) {
                $this->value = $value;
            }
        }
        $class_name  = explode('\\', $reflection->name);
        $class_name = $class_name[count($class_name) - 1];
        $this->reflection = $reflection;
        if (!isset($this->value)) {
            throw new ExpectedException("Invalid $class_name enum type!", 1000);
        }
    }

    public function getReflection()
    {
        return $this->reflection->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function valueIs($value): bool
    {
        return $this->value == $value;
    }
}
