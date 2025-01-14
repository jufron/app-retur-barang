<?php

namespace App\Http\Controllers;

use App\Services\Contract\HomeServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected HomeServiceInterface $homeService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeServiceInterface $homeService)
    {
        $this->middleware('auth');
        $this->homeService = $homeService;
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

    public function adminRetur () : JsonResponse
    {
        return response()->json([
            'status'    => 'success',
            'data'      => [
                'adminReturCount'           => $this->homeService->getAdminReturCount(),
                'warehouseReturCount'       => $this->homeService->getWarehouseReturCount(),
                'warehouseAsistentCount'    => $this->homeService->getWarehouseAsistentCount(),
                'logistikCount'             => $this->homeService->getLogistikUserCount(),
                'dataLogistikCount'         => $this->homeService->getDataLogistikCount(),
                'barangRusakCount'          => $this->homeService->getBarangRusakCount(),
                'barangSortirCount'         => $this->homeService->getBarangSortirCount(),
                'barangCount'               => $this->homeService->getBarangCount(),
                'kategoryBarangCount'       => $this->homeService->getKategoryBarangCount(),
                'notaReturBarangCount'      => $this->homeService->getNotaReturBarangCount(),
            ]
        ], 200);
    }

    public function logistik () : JsonResponse
    {
        return response()->json([
            'status'    => 'success',
            'data'      => [
                'dataLogistikCount'     =>  $this->homeService->getDataLogistikCount(),
            ]
        ], 200);
    }

    public function warehouseAsistent () : JsonResponse
    {
        return response()->json([
            'status'    => 'success',
            'data'      => [
                'barangSortirCount' => $this->homeService->getBarangSortirCount(),
            ]
        ], 200);
    }

    public function warehouseRetur () : JsonResponse
    {
        return response()->json([
            'data'  => [
                'warehouseReturCount'       => $this->homeService->getWarehouseReturCount(),
                'barangRusakCount'          => $this->homeService->getBarangRusakCount(),
                'barangSortirCount'         => $this->homeService->getBarangSortirCount(),
                'kategoryBarangCount'       => $this->homeService->getKategoryBarangCount(),
            ]
        ], 200);
    }
}
