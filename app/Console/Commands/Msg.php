<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\models\Tag;

class Msg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'msg:help';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Printing Help msg';

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
        // info('Every minute before');
        // sleep(65);
        // info('Every minute After');


       Tag::where('name','new Item')->where('id',6)->delete();

    }
}
