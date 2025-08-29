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
        $feed = FeedReader::make("https://feeds.feedburner.com/TechCrunch/", true);


        foreach ($feed->get_items() as $item) {
            $link = $item->get_permalink(); // first try
            if (empty($link)) {
                // fallback to raw <link> tag
                $linkTag = $item->get_item_tags('', 'link');
                $link = $linkTag[0]['data'] ?? null;
            }

            //des and img
            $rawDescription = $item->get_description();
            // extract first <img> (if exists)
            preg_match('/<img[^>]+src="([^">]+)"/i', $rawDescription, $matches);
            $imageUrl = $matches[1] ?? null;
            // remove <img> tag from description
            $description = preg_replace('/<img[^>]+\>/i', '', $rawDescription);

            //category
            $categories = $item->get_categories();
            $category = !empty($categories) ? $categories[0]->get_label() : "General";
            // print_r( $item->data);


            if ($link && !FeedsModel::where('link', $link)->exists()) {
                FeedsModel::create([
                    'title' => $item->get_title(),
                    'link' => $link,
                    'description' => $description,
                    'imgurl'=>$imageUrl,
                    'category' => $category,
                ]);
            }
        }


        $this->info("RSS feed fetched and saved ✅");
    }
}
