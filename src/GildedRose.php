<?php

namespace App;
use App\Interfaces\ItemStrategyInterface;

final class GildedRose
{
    public function updateQuality($item)
    {
        /** @var ItemStrategyInterface */
        $strategy = Innkeeper::getItemStrategy($item);
        $strategy->updateItemState();
    }
}