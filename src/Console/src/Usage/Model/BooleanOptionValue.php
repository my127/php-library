<?php

namespace my127\Console\Usage\Model;

class BooleanOptionValue implements OptionValue
{
    /**
     * @var bool
     */
    private $value;

    private function __construct(bool $value)
    {
        $this->value = $value;
    }

    public static function create(bool $value): self
    {
        return new self($value);
    }

    public function equals(OptionValue $value): bool
    {
        return $value == $this->value;
    }
}
