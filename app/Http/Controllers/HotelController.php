<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\View\View;

class HotelController extends Controller
{
    public function index(): View
    {
        $hotels = Hotel::all();
        
        // Dynamic scraping for the first hotel (Hemus)
        if ($hotels->count() > 0 && $hotels[0]->name === 'Hemus') {
            try {
                $browser = new \Symfony\Component\BrowserKit\HttpBrowser(\Symfony\Component\HttpClient\HttpClient::create());
                // Scrape from home page as shown in screenshot
                $crawler = $browser->request('GET', 'http://hotelhemus.com/');
                
                // Use the specific XPath seen in the devtools screenshot
                $imageNode = $crawler->filterXPath('//div[contains(@class, "wpb_single_image")]//img')->first();
                
                if ($imageNode->count() > 0) {
                    // Check for data-src first (lazy loading) then src
                    $src = $imageNode->attr('data-src') ?: $imageNode->attr('src');
                    if ($src) {
                        $hotels[0]->image = \Illuminate\Support\Str::contains($src, '://') ? $src : 'http://hotelhemus.com' . (str_starts_with($src, '/') ? '' : '/') . $src;
                    }
                }
            } catch (\Exception $e) {
                // Fallback to database image
            }
        }
        
        return view('hotels')->with('hotels', $hotels);
    }
}
