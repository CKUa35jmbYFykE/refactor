<?php

namespace App;

final class Item
{
    public const QUALITY_MAX = 50;
    public const QUALITY_LEGENDARY = 80;

    /** @var string */
    public $name;

    /** @var int */
    public $sell_in;

    /** @var int */
    public $quality;

    /**
     * __construct
     *
     * @param  mixed $name
     * @param  mixed $sell_in
     * @param  mixed $quality
     * @return void
     */
    public function __construct($name, $sell_in, $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     * age
     * A day has passed, decrease sellIn
     *
     * @return void
     */
    public function age()
    {
        $this->sell_in--;
    }

    /**
     * increaseQuality
     *
     * @param  int $value
     * @return void
     */
    public function increaseQuality()
    {
        if ($this->quality < Item::QUALITY_MAX) {
            $this->quality++;
        }
    }

    /**
     * decreaseQuality
     *
     * @param  int $value
     * @return void
     */
    public function decreaseQuality($value = 1)
    {
        if ($this->quality > 0) {
            $this->quality -= $value;
        }
    }

    /**
     * isExpired
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->sell_in < 0;
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf("{%s}, {%d}, {%d}", $this->name, $this->sell_in, $this->quality);
    }
}
