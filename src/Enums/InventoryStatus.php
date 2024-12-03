<?php

namespace StoresSuite\Wix\Enums;

enum InventoryStatus: string
{
    case IN_STOCK = 'IN_STOCK';
    case OUT_OF_STOCK = 'OUT_OF_STOCK';
    case PARTIALLY_OUT_OF_STOCK = 'PARTIALLY_OUT_OF_STOCK';
}
