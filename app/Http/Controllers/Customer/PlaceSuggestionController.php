<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PlaceSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceSuggestionController extends Controller
{
    public function index(Request $request)
    {
        $query = PlaceSuggestion::where('place_suggestion_description', 'like', '%' . $request->keyword)
            ->limit(10)
            ->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $query,
            ]
        );
    }

    public function store(Request $request)
    {
        foreach ($request->places as $item) {
            $query = PlaceSuggestion::where('place_suggestion_place_id', $item['place_suggestion_place_id'])->first();

            if ($query == null) {
                PlaceSuggestion::create([
                    'place_suggestion_id' => Str::uuid(),
                    'place_suggestion_place_id' => $item['place_suggestion_place_id'],
                    'place_suggestion_latitude' => $item['place_suggestion_latitude'] ?? null,
                    'place_suggestion_longitude' => $item['place_suggestion_longitude'] ?? null,
                    'place_suggestion_street' => $item['place_suggestion_street'] ?? null,
                    'place_suggestion_sub_locality' => $item['place_suggestion_sub_locality'] ?? null,
                    'place_suggestion_locality' => $item['place_suggestion_locality'] ?? null,
                    'place_suggestion_sub_adm_area' => $item['place_suggestion_sub_adm_area'] ?? null,
                    'place_suggestion_adm_area' => $item['place_suggestion_adm_area'] ?? null,
                    'place_suggestion_postal_code' => $item['place_suggestion_postal_code'] ?? null,
                    'place_suggestion_country' => $item['place_suggestion_country'] ?? null,
                    'place_suggestion_description' => $item['place_suggestion_description'] ?? null,
                ]);
            }
        }

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => null,
            ]
        );
    }
}
