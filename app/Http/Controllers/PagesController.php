<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flower;

class PagesController extends Controller
{
    public function index(){
      $flowers = Flower::orderBy('name', 'asc')->paginate(10);
      return view('pages.index')->with('flowers', $flowers);
    }
}
