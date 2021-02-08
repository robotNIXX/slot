<?php
return [
    'convertors' => [
        'to_cash' => env('BONUS_TO_CASH_RATIO', 0.3),
        'to_bonus' => env('CASH_TO_BONUS_RATIO', 3)
    ]
];
