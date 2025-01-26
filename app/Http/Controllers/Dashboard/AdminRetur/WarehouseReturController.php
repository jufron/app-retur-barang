<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminReturRequest;
use App\Services\Contract\UserManajementServiceInterface;

class WarehouseReturController extends Controller
{
    /**
     * @var UserManajementServiceInterface
     */
    protected UserManajementServiceInterface $userManajementService;

    /**
     * Constructor
     *
     * @param UserManajementServiceInterface $userManajementService
     */
    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    /**
     * Display a listing of warehouse retur users
     *
     * @return View
     */
    public function index() : View
    {
        $users = $this->userManajementService->getUser('warehouse-retur');
        return view('dashboard.admin.warehouse-retur-manajement.index', compact('users'));
    }

    /**
     * Show the form for creating a new warehouse retur user
     *
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.admin.warehouse-retur-manajement.create');
    }

    /**
     * Store a newly created warehouse retur user
     *
     * @param AdminReturRequest $request
     * @return RedirectResponse
     */
    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'warehouse-retur',
            message: 'Warehouse Retur',
            redirectRouteName: 'admin.warehouse-retur.index'
        );
    }

    /**
     * Display the specified warehouse retur user
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    /**
     * Show the form for editing the specified warehouse retur user
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        return view('dashboard.admin.warehouse-retur-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    /**
     * Update the specified warehouse retur user
     *
     * @param AdminReturRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(AdminReturRequest $request, User $user) : RedirectResponse
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Warehouse Retur',
            redirectRouteName: 'admin.warehouse-retur.index'
        );
    }

    /**
     * Remove the specified warehouse retur user
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Warehouse Retur',
            redirectRouteName: 'admin.warehouse-retur.index'
        );
    }
}
