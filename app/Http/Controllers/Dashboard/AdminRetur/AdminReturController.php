<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminReturRequest;
use App\Services\Contract\UserManajementServiceInterface;

class AdminReturController extends Controller
{
    protected $userManajementService;

    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    public function index() : View
    {
        $users = $this->userManajementService->getUser('admin-retur');
        return view('dashboard.admin.admin-retur-manajement.index', compact('users'));
    }

    public function create() : View
    {
        return view('dashboard.admin.admin-retur-manajement.create');
    }

    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request, 
            roleName: 'admin-retur',
            message: 'Admin Retur',
            redirectRouteName: 'admin-retur.index'
        );
    }

    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    public function edit(User $user) : View
    {
        return view('dashboard.admin.admin-retur-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    public function update(AdminReturRequest $request, User $user)
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Admin Retur',
            redirectRouteName: 'admin-retur.index'
        );
    }

    public function destroy(User $user)
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Admin Retur',
            redirectRouteName: 'admin-retur.index'
        );
    }
}
