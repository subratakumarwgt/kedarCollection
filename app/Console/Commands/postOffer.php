<?php

namespace App\Console\Commands;

use App\Models\Offer;
use Illuminate\Console\Command;

class postOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:offer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes offer visible or vanished for users .';

    protected $counts = [
        "started" => 0,
        "ended" => 0
    ];

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
        $counts["started"] =  Offer::where("status","1")->whereDate("start_date","<=",date("Y-m-d H:i:s"))->count();
        Offer::where("status","1")->whereDate("start_date","<=",date("Y-m-d H:i:s"))->update(["status"=>"2"]);
        $counts["ended"] =  Offer::where("end_date","2")->whereDate("start_date","<=",date("Y-m-d H:i:s"))->count();
        Offer::where("status","2")->whereDate("end_date","<=",date("Y-m-d H:i:s"))->update(["status"=>"3"]);
        $this->info($counts["started"].' offers started and '.$counts["ended"].' offers ended');
        return $counts;
    }
}
