<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class IndexController extends Controller
{
    public function product()
    {
        $book = Book::where('status','=',1)->orderBy('id', 'DESC')->get();
        return view('frontend.product')->with(compact('book'));
    }
}
