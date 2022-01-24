<?php

namespace App\Strategies;

use App\Item;

class AgedBrieStrategy extends BaseStrategy
{
    /**
     * updateItemState
     *
     * @return void
     */
    public function updateItemState()
    {
        // Quality increases the older it gets
        $this->item->increaseQuality();

        $this->item->age();

        if ($this->item->isExpired()) {
            // Quality increases twice as fast once the sell by date has passed
            $this->item->increaseQuality();
        }
    }
}
