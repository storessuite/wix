<?php

namespace StoresSuite\Wix\Enums;

enum AccessTokenValidity: int
{
    case GRACE_PERIOD_BEFORE_EXPIRY = 2; // In minutes
    case VALIDITY_PERIOD = 5; // In minutes
}
