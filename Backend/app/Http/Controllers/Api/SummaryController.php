<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SummaryCollection;
use App\Models\Summary;

class SummaryController extends Controller
{
    public function getSummaries(): SummaryCollection
    {
        return new SummaryCollection(Summary::all());
    }
}
