<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use patie\DbDumper\Databases\PostgreSql;

class Auto_Backup_Database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
          
          // $backp=Spatie\DbDumper\Databases\PostgreSql::create()
          //   ->setDbName($databaseName)
          //   ->setUserName($userName)
          //   ->setPassword($password)
          //   ->dumpToFile('dump.sql');
       // pg_dump -U username -W -F t database_name > c:\backup_file.tar
        $command = "pg_dump -U " . env('DB_USERNAME')." ". env('DB_DATABASE'). " > " . storage_path() . "/app/backup/" . $filename;
        //" --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
    }
}