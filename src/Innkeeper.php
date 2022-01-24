<?php

namespace App;

use App\Strategies\AgedBrieStrategy;
use App\Strategies\BackstagePassStrategy;
use App\Strategies\BaseStrategy;
use App\Strategies\SulfurasStrategy;

class Innkeeper
{
    public const ITEM_AGED_BRIE = 'Aged Brie';
    public const ITEM_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    public const ITEM_BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * getItemStrategy
     * @param  Item $item
     * @return ItemStrategyInterface
     */
    public static function getItemStrategy($item)
    {
        if ($item->name === self::ITEM_AGED_BRIE) {
            $strategy = new AgedBrieStrategy($item);
        } elseif ($item->name === self::ITEM_SULFURAS) {
            $strategy = new SulfurasStrategy($item);
        } elseif ($item->name === self::ITEM_BACKSTAGE_PASSES) {
            $strategy = new BackstagePassStrategy($item);
        } else {
            $strategy = new BaseStrategy($item);
        }

        return $strategy;
    }
}
