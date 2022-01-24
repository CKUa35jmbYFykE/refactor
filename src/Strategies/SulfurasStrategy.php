<?php

namespace App\Strategies;

use App\Item;

class SulfurasStrategy extends BaseStrategy
{
    /**
     * updateItemState
     *
     * @return void
     */
    public function updateItemState()
    {
        // Sulfuras being a legendary item, never has to be sold or decreases in Quality
        if ($this->item->quality > 0) {
            $this->item->quality = Item::QUALITY_LEGENDARY;
        }
    }
}
