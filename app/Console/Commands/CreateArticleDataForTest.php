<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;

class CreateArticleDataForTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-fake-article-data {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake data for article';

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
        $amount = $this->argument('amount') ?? 1;

        $bar = $this->output->createProgressBar($amount);

        $bar->start();

        for ($i = 0; $i < $amount; $i++) {
            Factory(Article::class)->create();

            $bar->advance();
        }

        $bar->finish();
    }
}
