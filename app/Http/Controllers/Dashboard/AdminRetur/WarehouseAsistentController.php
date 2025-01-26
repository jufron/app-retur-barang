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
    /**
     * @var UserManajementServiceInterface
     */
    protected UserManajementServiceInterface $userManajementService;

    /**
     * Constructor
     * @param UserManajementServiceInterface $userManajementService
     */
    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    /**
     * Display a listing of warehouse assistants
     * @return View
     */
    public function index() : View
    {
        $users = $this->userManajementService->getUser('warehouse-asisten');
        return view('dashboard.admin.warehouse-asisten-manajement.index', compact('users'));
    }

    /**
     * Show the form for creating a new warehouse assistant
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.admin.warehouse-asisten-manajement.create');
    }

    /**
     * Store a newly created warehouse assistant
     * @param AdminReturRequest $request
     * @return RedirectResponse
     */
    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'warehouse-asisten',
            message: 'Warehouse Asistent',
            redirectRouteName: 'admin.warehouse-asistent.index'
        );
    }

    /**
     * Display the specified warehouse assistant
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    /**
     * Show the form for editing the specified warehouse assistant
     * @param User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        return view('dashboard.admin.warehouse-asisten-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    /**
     * Update the specified warehouse assistant
     * @param AdminReturRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(AdminReturRequest $request, User $user) : RedirectResponse
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Warehouse Asistent',
            redirectRouteName: 'admin.warehouse-asistent.index'
        );
    }

    /**
     * Remove the specified warehouse assistant
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user) : RedirectResponse
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Warehouse Asistent',
            redirectRouteName: 'admin.warehouse-asistent.index'
        );
    }
}
