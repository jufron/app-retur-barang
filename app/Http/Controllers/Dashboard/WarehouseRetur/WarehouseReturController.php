<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminReturRequest;
use App\Http\Requests\UserRequest;
use App\Services\Contract\UserManajementServiceInterface;

class WarehouseReturController extends Controller
{
    /**
     * @var UserManajementServiceInterface
     */
    protected UserManajementServiceInterface $userManajementService;

    /**
     * Constructor for WarehouseReturController
     *
     * @param UserManajementServiceInterface $userManajementService The user management service instance
     */
    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    /**
     * Display a listing of the warehouse retur users.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $users = $this->userManajementService->getUser('warehouse-retur');
        return view('dashboard.warehouse-retur.warehouse-retur-manajement.index', compact('users'));
    }

    /**
     * Show the form for creating a new warehouse retur user.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.warehouse-retur-manajement.create');
    }

    /**
     * Store a newly created warehouse retur user in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'warehouse-retur',
            message: 'Warehouse Retur',
            redirectRouteName: 'wr.warehouse-retur.index'
        );
    }

    /**
     * Display the specified warehouse retur user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    /**
     * Show the form for editing the specified warehouse retur user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user) : View
    {
        return view('dashboard.warehouse-retur.warehouse-retur-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    /**
     * Update the specified warehouse retur user in storage.
     *
     * @param  UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user) : RedirectResponse
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Warehouse Retur',
            redirectRouteName: 'wr.warehouse-retur.index'
        );
    }

    /**
     * Remove the specified warehouse retur user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user) : RedirectResponse
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Warehouse Retur',
            redirectRouteName: 'wr.warehouse-retur.index'
        );
    }
}
