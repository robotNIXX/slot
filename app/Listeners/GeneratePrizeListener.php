<?php

namespace App\Listeners;

use App\Enums\PrizeStatus;
use App\Enums\PrizeType;
use App\Enums\UserPrizeStatus;
use App\Events\GeneratePrize;
use App\Models\BonusPrize;
use App\Models\CashPrize;
use App\Models\Game;
use App\Models\PhysicalObject;
use App\Models\PhysicalPrize;
use App\Models\UserPrize;
use App\Models\UserPrizeHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GeneratePrizeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param GeneratePrize $event
     * @return void
     */
    public function handle(GeneratePrize $event)
    {
        $userPrize = null;
        echo $event->type;
        switch ($event->type) {
            default:
            case (PrizeType::Bonus):
                $bonusPrize = BonusPrize::create([
                    'game_id' => $event->game->id,
                    'status' => PrizeStatus::Selected,
                    'sum' => random_int($event->game->min_bonus_prize, $event->game->max_bonus_prize)
                ]);
                $userPrize = UserPrize::create([
                    'game_id' => $event->game->id,
                    'user_id' => $event->user->id,
                    'awarded_id' => $bonusPrize->id,
                    'awarder_type' => BonusPrize::class,
                    'details' => ''
                ]);
                break;
            case (PrizeType::Physical):
                if ($this->availability(PrizeType::Physical, $event->game)) {
                    $phPrizeId = $this->availabilityOfPhysicalObject($event->game);
                    if ($phPrizeId) {
                        $phPrize = PhysicalPrize::create([
                            'object_id' => $phPrizeId,
                            'status' => PrizeStatus::Selected
                        ]);
                        $userPrize = UserPrize::create([
                            'game_id' => $event->game->id,
                            'user_id' => $event->user->id,
                            'awarded_id' => $phPrize->id,
                            'awarder_type' => PhysicalPrize::class,
                            'details' => ''
                        ]);
                    }
                }
                break;
            case (PrizeType::Cash):
                if ($this->availability(PrizeType::Cash, $event->game)) {
                    $cPrize = CashPrize::create([
                        'status' => PrizeStatus::Idle,
                        'game_id' => $event->game->id,
                        'sum' => random_int($event->game->min_cash_prize, $event->game->max_cash_prize)
                    ]);
                    $userPrize = UserPrize::create([
                        'game_id' => $event->game->id,
                        'user_id' => $event->user->id,
                        'awarded_id' => $cPrize->id,
                        'awarder_type' => CashPrize::class,
                        'details' => ''
                    ]);

                }
                break;
        }

        if ($userPrize) {
            UserPrizeHistory::create([
                'prize_id' => $userPrize->id,
                'status' => UserPrizeStatus::Awarded
            ]);
        }
    }

    protected function availability($type, Game $game)
    {

        $savedCashPrizes = CashPrize::where('game_id', $game->id)->count();
        $savedPhysicalPrizes = count($game->physicalPrizes);

        $availabilities = [
            PrizeType::Cash => $game->cash_prizes_amount - $savedCashPrizes,
            PrizeType::Physical => $game->physical_prizes_amount - $savedPhysicalPrizes
        ];

        return $availabilities[$type] > 0;
    }

    protected function availabilityOfPhysicalObject(Game $game)
    {
        $prizes = PhysicalObject::has('prizes', '<', 1)->get();

        if (count($prizes) > 0) {
            return $prizes->random()->id;
        }

        return false;
    }

    protected function availabilityOfCashPrize(Game $game)
    {
        $prizes = CashPrize::where('status', PrizeStatus::Free)
            ->where('game_id', $game->id)->get();

        if (count($prizes) > 0) {
            return $prizes->random();
        }

        return false;
    }
}
