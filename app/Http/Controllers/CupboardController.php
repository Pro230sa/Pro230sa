<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupboard;

class CupboardController extends Controller
{
    public function index() {
        $cupBoards = Cupboard::all();

        return view('reservatioNow', compact('cupBoards'));
    }
}
