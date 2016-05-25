<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use stdClass;
use Twitter;

class UpdateTweeps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweeps:update {search=#phptek}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tweeps from the current #phptek search results';

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
     * @return mixed
     */
    public function handle()
    {
        $search = Twitter::getSearch([
            'q' => $this->argument('search'),
            'count' => 100,
        ]);

        $users = [];
        array_walk($search->statuses, function (stdClass $value, int $idx) use (&$users) {
            $users[$value->user->screen_name] = $value->user->name;
        });
        array_walk($users, function (string $name, string $account) {
            $this->updateTweep($account, $name);
        });

        echo "\nMuahahahahaha!\n";
    }

    private function updateTweep(string $account, string $name)
    {
        echo "Setting the name of $account to $name...\n";
        DB::statement("REPLACE INTO tweeps (account, name) VALUES (?, ?)", [$account, $name]);
    }
}
