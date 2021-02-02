<?php

namespace my127\Console\Usage\Model;

class OptionDefinition
{
    const TYPE_BOOL  = 'bool';
    const TYPE_VALUE = 'value';

    /**
     * Short Name
     *
     * @var null|string
     */
    private $shortName;

    /**
     * Long Name
     *
     * @var null|string
     */
    private $longName;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * @var null|string
     */
    private $type;

    /**
     * @var OptionValue
     */
    private $default;

    /**
     * @var null|string
     */
    private $argument;

    public function __construct(
        ?string $shortName = null,
        ?string $longName = null,
        ?string $description = null,
        string $type = self::TYPE_BOOL,
        ?OptionValue $default = null,
        ?string $argument = null
    ) {
        if (null === $default) {
            $default = $this->createDefaultOptionValue($type);
        }

        $this->shortName    = $shortName;
        $this->longName     = $longName;
        $this->description  = $description;
        $this->type         = $type;
        $this->default      = $default;
        $this->argument     = $argument;
    }

    public function getLabel()
    {
        $names = [];

        if ($this->longName !== null) {
            $names[] = '--'.$this->longName;
        }

        if ($this->shortName !== null) {
            $names[] = '-'.$this->shortName;
        }

        return implode('|', $names).' (type:'.$this->type.')';
    }

    public function getDefault(): OptionValue
    {
        return $this->default;
    }

    /**
     * Get Short Name
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set Short Name
     *
     * @param string $shortName
     *
     * @return void
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * Get Long Name
     *
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * Set Long Name
     *
     * @param string $longName
     *
     * @return void
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param string $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getArgument()
    {
        return $this->argument;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

    private function createDefaultOptionValue(string $type): OptionValue
    {
        switch ($type) {
            case self::TYPE_BOOL:
                return BooleanOptionValue::create(false);
            default:
                return StringOptionValue::create('');
        }
    }
}
