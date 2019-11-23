<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        // TODO: 3. Facadeを補完
        \Log::debug('幸せ');

        // TODO: 2. 文字列参照を解決
        return view('welcome');
    }
}
