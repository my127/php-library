<?php

namespace my127\Console\Usage\Model;

class StringOptionValue implements OptionValue
{
    /**
     * @var string
     */
    private $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): self
    {
        return new self($value);
    }

    public function equals(OptionValue $value): bool
    {
        return $value->value() == $this->value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
