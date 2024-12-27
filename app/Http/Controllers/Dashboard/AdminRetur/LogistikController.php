<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminReturRequest;
use App\Services\Contract\UserManajementServiceInterface;

class LogistikController extends Controller
{
    protected $userManajementService;

    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    public function index() : View
    {
        $users = $this->userManajementService->getUser('logistik');
        return view('dashboard.admin.logistik-manajement.index', compact('users'));
    }

    public function create() : View
    {
        return view('dashboard.admin.logistik-manajement.create');
    }

    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'logistik',
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }

    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    public function edit(User $user) : View
    {
        return view('dashboard.admin.logistik-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    public function update(AdminReturRequest $request, User $user) : RedirectResponse
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }

    public function destroy(User $user)
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }

}
