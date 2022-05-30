<?php


namespace App\Support\Models;


abstract class Model
{
    public static abstract function builder(): static;

    public function toArray(): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (isset($value)) {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
