<?php

namespace App\Controllers;

class C_home_pelanggan extends BaseController
{
    public function index()
    {
        $data['session'] = session();
        $data['judul_halaman'] = 'Dashboard';
        return view('template_pelanggan/V_home', $data);
    }
}
