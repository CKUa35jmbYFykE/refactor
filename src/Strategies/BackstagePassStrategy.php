<?php

namespace App\Strategies;

use App\Item;

class BackstagePassStrategy extends BaseStrategy
{
    public const CONCERT_APPROCHING_STAGE_1 = 11;
    public const CONCERT_APPROCHING_STAGE_2 = 6;

    /**
     * updateItemState
     *
     * @return void
     */
    public function updateItemState()
    {
        $this->beforeConcertUpdate();
        $this->item->age();

        if ($this->item->isExpired()) {
            // Quality drops to 0 after the concert
            $this->item->decreaseQuality($this->item->quality);
        }
    }

    /**
     * beforeConcertUpdate
     *
     * @return void
     */
    private function beforeConcertUpdate()
    {        
        if ($this->item->quality < Item::QUALITY_MAX) {
            // Quality increases as concert approaches
            $this->item->increaseQuality();
            if ($this->item->sell_in < self::CONCERT_APPROCHING_STAGE_1) {
                // Quality increases by 2 when there are 10 days or less
                $this->item->increaseQuality();
            }
            if ($this->item->sell_in < self::CONCERT_APPROCHING_STAGE_2) {
                // Quality increases by 3 when there are 5 days or less
                $this->item->increaseQuality();
            }
        }
    }
}
