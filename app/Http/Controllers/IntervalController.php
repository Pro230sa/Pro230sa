<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Interval;


class IntervalController extends Controller
{
    public function index(){
        $intervals = Interval::all();
        dd($intervals);
        return view('Interval.index');

    }
}
