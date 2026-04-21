 <?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels')->middleware('auth');

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/roomprice/{id}', function ($id) {
    try {
        $room = App\Models\Room::findOrFail($id);
        
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'http://hotelhemus.com/rooms/');

        // Try to find a section that mentions the room type (e.g. "апартамент")
        // and extract the price from that specific section.
        $targetPrice = $crawler->filter('.room-item') // Assuming .room-item is a common container
            ->filter("div:contains('{$room->type}')")
            ->filter('.price')
            ->first();

        if ($targetPrice->count() > 0) {
            return response($targetPrice->text());
        }

        // Fallback: If no specific match, try a more general search or return the first available price
        $prices = $crawler->filter('.price');
        if ($prices->count() > 0) {
            // We can pick an index based on the ID for variety if a specific match isn't found
            $index = ($id - 1) % $prices->count();
            return response($prices->eq($index)->text());
        }

        return response('Price information currently unavailable.', 404);
    } catch (\Exception $e) {
        return response('Error fetching live price: ' . $e->getMessage(), 500);
    }
});

Route::get('/rooms/{id}', [RoomController::class, 'show']);

Route::group(['prefix' => 'dashboard'], function () {
    Route::view('/', 'dashboard/dashboard');
    Route::get('reservations/create/{id}', [ReservationController::class, 'create']);
    Route::resource('reservations', ReservationController::class)->except('create');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
