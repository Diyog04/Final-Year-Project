namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Assuming you have an Event model

class EventController extends Controller
{
    // Load the view with an empty collection initially
    public function index()
    {
        return view('user.index', ['events' => collect()]); // Pass an empty collection to avoid errors
    }

    // Handle search requests
    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        if ($request->filled('date')) {
            $query->whereDate('event_date', $request->date);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $events = $query->get(); // Fetch search results

        return view('user.index', compact('events')); // Pass results to the view
    }
}
