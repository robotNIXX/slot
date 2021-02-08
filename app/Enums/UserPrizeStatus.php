<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class UserPrizeStatus
 * @package App\Enums
 */
final class UserPrizeStatus extends Enum
{
    const Awarded = 0;
    const Sending = 1;
    const Received = 2;
}
