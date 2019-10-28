<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeFunko extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:funko';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Funko POP! Vinyl Scraper';

    protected $collections = [
        'animation',
        'disney',
        'games',
        'heroes',
        'marvel',
        'monster-high',
        'movies',
        'pets',
        'rocks',
        'sports',
        'star-wars',
        'television',
        'the-vault',
        'the-vote',
        'ufc',
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
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->collections as $collection) {
            $this->scrape($collection);
        }
    }
     /**
     * For scraping data for the specified collection.
     *
     * @param  string $collection
     * @return boolean
     */
    public static function scrape($collection)
    {
        
        $crawler = \Goutte::request('GET', env('SIGMALIVE_URL'));
        $pages = ($crawler->filter('.pager--items .pager li')->count() > 0)
            ? 0
            : 0
        ;

        if($pages->len() == 0) return false;

        
        return true;
    }

}
