<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogList;
use App\Models\DogListItem;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    protected $validHttpCodes = [
        100, 101, 102, 103,
        200, 201, 202, 203, 204, 205, 206, 207, 208, 218, 226,
        300, 301, 302, 303, 304, 305, 306, 307, 308,
        400, 401, 402, 403, 404, 405, 406, 407, 408, 409,
        410, 411, 412, 413, 414, 415, 416, 417, 418, 419,
        420, 421, 422, 423, 424, 425, 426, 428, 429,
        430, 431, 440, 444, 449, 450, 451,
        460, 463, 464, 494, 495, 496, 497, 498, 499,
        500, 501, 502, 503, 504, 505, 506, 507, 508, 509,
        510, 511, 520, 521, 522, 523, 524, 525, 526, 527,
        529, 530, 561, 598, 599, 999
    ];
    public function index() {
        return view('search.index');
    }

    public function filter(Request $request) {
        $filter = $request->input('filter');

        $pattern = '/^' . str_replace('x', '[0-9]', $filter) . '$/';


        $results = [];
        foreach ($this->validHttpCodes as $code) {
            if (preg_match($pattern, (string)$code)) {
                $results[$code] = "https://http.dog/{$code}.jpg";
            }
        }
        
        return view('search.index', compact('results', 'filter'));
    }

    public function saveList(Request $request) {
        $filter = $request->input('filter');
        $listName = $request->input('list_name');

        if (!$filter || !$listName) {
            return redirect()->back()->withErrors('Filter and list name are required.');
        }

        $pattern = '/^' . str_replace('x', '[0-9]', $filter) . '$/';

        $dogList = DogList::create([
            'user_id' => Auth::id(),
            'name' => $listName
        ]);

        foreach ($this->validHttpCodes as $code) {
            if (preg_match($pattern, (string)$code)) {
                DogListItem::create([
                    'dog_list_id' => $dogList->id,
                    'response_code' => $code,
                    'image_url' => "https://http.dog/{$code}.jpg"
                ]);
            }
        }

        return redirect()->route('lists.index')->with('success', 'List saved successfully.');
    }
}

