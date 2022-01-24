<?php

namespace App\Strategies;

use App\Interfaces\ItemStrategyInterface;
use App\Item;

class BaseStrategy implements ItemStrategyInterface
{
    /** @var Item */
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }
    /**
     * updateItemState
     *
     * @return void
     */
    public function updateItemState()
    {
        // Quality & SellIn drops at the end of each day
        $this->item->decreaseQuality();

        $this->item->age();
        if ($this->item->isExpired()) {
            //Once the sell by date has passed, Quality degrades twice as fast
            $this->item->decreaseQuality();
        }
    }
}
