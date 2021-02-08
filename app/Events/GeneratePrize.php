<?php

namespace App\Events;

use App\Enums\PrizeType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GeneratePrize
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type;

    /**
     * @var Game
     */
    public $game;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $user)
    {
        $this->type = random_int(PrizeType::Cash, PrizeType::Bonus);
        $this->game = $game;
        $this->user = $user;
    }
}
