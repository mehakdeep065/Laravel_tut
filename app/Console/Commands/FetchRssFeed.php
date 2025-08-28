<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feeds as FeedsModel;   // ✅ Your DB model
use Feeds as FeedReader;              // ✅ The RSS package

class FetchRssFeed extends Command
{
    protected $signature = 'rss:fetch';
    protected $description = 'Fetch RSS feed and save posts to DB';

    public function handle()
    {
        // use package to fetch RSS
        $feed = FeedReader::make("https://timesofindia.indiatimes.com/rssfeeds/4719148.cms", true);

        foreach ($feed->get_items() as $item) {
            $link = $item->get_link(); // first try
            if (empty($link)) {
                // fallback to raw <link> tag
                $linkTag = $item->get_item_tags('', 'link');
                $link = $linkTag[0]['data'] ?? null;
            }

            $this->info("Saving: " . $link);

            $categories = $item->get_categories();
            $category = !empty($categories) ? $categories[0]->get_label() : "General";

            if ($link && !FeedsModel::where('link', $link)->exists()) {
                FeedsModel::create([
                    'title' => $item->get_title(),
                    'link' => $link,
                    'description' => $item->get_description(),
                    'category' => $category,
                ]);
            }
        }


        $this->info("RSS feed fetched and saved ✅");
    }
}
