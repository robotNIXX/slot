<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


/**
 * Class PrizeStatus
 * @package App\Enums
 */
final class PrizeStatus extends Enum
{
    const Free = 0;
    const Selected = 1;
    const Converted = 2;
    const Idle = 3;
}
