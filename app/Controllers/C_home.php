<?php

namespace App\Controllers;

class C_home extends BaseController
{

    public function index()
    {

        $data['judul_halaman'] = 'Dashboard';
        return view('V_home', $data);
    }
}
