<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminReturRequest;
use App\Services\Contract\UserManajementServiceInterface;

class WarehouseAsistentController extends Controller
{
    protected $userManajementService;

    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    public function index() : View
    {
        $users = $this->userManajementService->getUser('warehouse-asisten');
        return view('dashboard.admin.warehouse-asisten-manajement.index', compact('users'));
    }

    public function create() : View
    {
        return view('dashboard.admin.warehouse-asisten-manajement.create');
    }

    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request, 
            roleName: 'warehouse-asisten',
            message: 'Warehouse Asistent',
            redirectRouteName: 'warehouse-asistent.index'
        );
    }

    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    public function edit(User $user) : View
    {
        return view('dashboard.admin.warehouse-asisten-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    public function update(AdminReturRequest $request, User $user) : RedirectResponse
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Warehouse Asistent',
            redirectRouteName: 'warehouse-asistent.index'
        );
    }

    public function destroy(User $user) : RedirectResponse
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Warehouse Asistent',
            redirectRouteName: 'warehouse-asistent.index'
        );
    }
}