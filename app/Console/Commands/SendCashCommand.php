<?php

namespace App\Console\Commands;

use App\Enums\UserPrizeStatus;
use App\Models\CashPrize;
use App\Models\UserPrize;
use App\Services\SendCashToBank;
use Illuminate\Console\Command;

class SendCashCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slotegrator:send_cash {batch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send cash (batched)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $batch = $this->argument('batch');
        $skip = 0;
        while ($items = UserPrize::where('awarded_type', CashPrize::class)->where('status', UserPrizeStatus::Awarded)->skip($skip)->take($batch)->get()) {
            if (count($items) == 0) {
                break;
            }
            SendCashToBank::send($items);
            $skip += $batch;
        }
    }
}
