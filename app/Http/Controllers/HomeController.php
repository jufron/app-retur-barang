<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('admin-retur')) {
            notify()->success('Selamat Datang Admin Retur : ' . $user->username);
            return view('dashboard.admin-retur-dashboard', [
                'username' => $user->username,
                'name'      => $user->name,
                'email'     => $user->email
            ]);
        } else if ($user->hasRole('logistik')) {
            notify()->success('Selamat Datang Logistik : ' . $user->username);
            return view('dashboard.logistik-dashboard', [
                'username'  => $user->username,
                'name'      => $user->name,
                'email'     => $user->email
            ]);
        } else if ($user->hasRole('warehouse-asisten')) {
            notify()->success('Selamat Datang Warehouse Asisten : ' . $user->username);
            return view('dashboard.warehouse-asistent-dashboard', [
                'username'  => $user->username,
                'name'      => $user->name,
                'email'     => $user->email
            ]);
        } else if ($user->hasRole('warehouse-retur')) {
            notify()->success('Selamat Datang Warehouse Retur : ' . $user->username);
            return view('dashboard.warehouse-retur-dashboard', [
                'username'  => $user->username,
                'name'      => $user->name,
                'email'     => $user->email
            ]);
        } else {
            return view('home');
        }
    }

    public function warehouseRetur ()
    {
        return response()->json([
            'data'  => [
                'warehouseReturCount',
                'barangRusakCount',
                'barangSortirCount',
                'kategoryBarangCount'
            ]
        ], 200);
    }
}
