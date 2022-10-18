<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        $name = 'Vinícius';
        return view('site.principal', ['name' => $name]);
    }
}
