<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $books = [
          [
            'id' => 1,
            'title' => 'The AI Revolution',
            'author' => 'Jane Smith',
          ],
          [
            'id' => 2,
            'title' => 'The AI Revolution',
            'author' => 'Jane Smith',
          ],
          [
            'id' => 3,
            'title' => 'The AI Revolution',
            'author' => 'Jane Smith',
          ],
          [
            'id' => 4,
            'title' => 'The AI Revolution',
            'author' => 'Jane Smith',
          ],
        ];
        return view('homepage.index', ['books' => $books]);
    }

    public function book(int $id) {
        return view('homepage.book');
    }
}
