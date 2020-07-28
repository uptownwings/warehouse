<?php

namespace App\Console\Commands;

use App\WarehouseItem;
use Illuminate\Console\Command;

class PurgeDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:purge';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purges database of data older than set number of days';

    /**
     * The number of days after which data should be purged from the database.
     *
     * @var int
     */
    private $days = 7;

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
        $date = new \DateTime();
        $date->modify('-' . $this->days . ' days');
        $formattedDate = $date->format('Y-m-d H:i:s');
        WarehouseItem::query()->where('created_at', '<=', $formattedDate)->delete();
    }
}
