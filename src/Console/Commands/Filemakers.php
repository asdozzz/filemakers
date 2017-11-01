<?php

namespace Asdozzz\Filemakers\Console\Commands;

class Filemakers extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fm:build {alias} {module} {essence} {--nosp=}';

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
     * @return mixed
     */
    public function handle()
    {
        try 
        {
            $arguments = $this->argument();

            if (empty($arguments['alias']))
            {
                throw new \Exception(\Lang::get('filemakers.console.error.alias_not_found'));
            }

            $class = \Filemakers::factory($arguments['alias'])->build($this);
        } 
        catch (\Exception $e)
        {
            return $this->error($e->getMessage());
        }
     }
}
