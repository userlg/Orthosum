<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Summary;

class SummaryController extends Controller
{
    public function getSummaries()
    {
        $summaries = Summary::all();

        return response()->json($summaries);
    }
}
