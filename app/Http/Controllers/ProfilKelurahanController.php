<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilKelurahanController extends Controller
{
    public function index()
    {
        return view('profil-kelurahan.index');
    }
}
