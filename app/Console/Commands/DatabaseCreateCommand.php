<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;

class DatabaseCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates a new database';

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
        $database = env('DB_DATABASE', false);

        if (! $database) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
            
            // Defining charset
            $charset = env('DB_CHARSET', false);
            $charset = $charset ? "CHARACTER SET $charset" : '';
            
            // Defining collation
            $collation = env('DB_COLLATION', false);
            $collation = $collation ? "COLLATE $collation" : '';
            
            // Defining command
            $command = "CREATE DATABASE IF NOT EXISTS $database $charset $collation;";

            $succeeded = $pdo->exec($command);
            if($succeeded === false){
                $this->error("Failed to create database: ".($pdo->errorInfo()[2]));
                return;
            }

            $this->info(sprintf('Successfully created %s database', $database));

        } catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
