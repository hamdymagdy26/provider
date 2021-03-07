<?php

namespace App\Utility;

/**
 * Class ProviderStatus
 * @package App\Utility
 */
class ProviderStatus
{
    /**
     *
     */
    const AUTHORISED = 'authorised';

    /**
     *
     */
    const DECLINE = 'decline';

    /**
     *
     */
    const REFUNDED = 'refunded';

    public static function providerStatus() : array
    {
        return [
            self::AUTHORISED,
            self::DECLINE,
            self::REFUNDED
        ];
    }

}