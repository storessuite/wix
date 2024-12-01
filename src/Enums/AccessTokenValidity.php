<?php

namespace StoresSuite\Enums;

enum AccessTokenValidity: string
{
    case GRACE_PERIOD_BEFORE_EXPIRY = 2; // In minutes
    case VALIDITY_PERIOD = 5; // In minutes
}
