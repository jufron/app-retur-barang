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
    /**
     * @var UserManajementServiceInterface
     */
    protected UserManajementServiceInterface $userManajementService;

    /**
     * Constructor for AdminReturController
     *
     * @param UserManajementServiceInterface $userManajementService
     */
    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    /**
     * Display a listing of admin retur users
     *
     * @return View
     */
    public function index() : View
    {
        $users = $this->userManajementService->getUser('admin-retur');
        return view('dashboard.admin.admin-retur-manajement.index', compact('users'));
    }

    /**
     * Show the form for creating a new admin retur
     *
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.admin.admin-retur-manajement.create');
    }

    /**
     * Store a newly created admin retur in storage
     *
     * @param AdminReturRequest $request
     * @return RedirectResponse
     */
    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'admin-retur',
            message: 'Admin Retur',
            redirectRouteName: 'admin.admin-retur.index'
        );
    }

    /**
     * Display the specified admin retur
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    /**
     * Show the form for editing the specified admin retur
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        return view('dashboard.admin.admin-retur-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    /**
     * Update the specified admin retur in storage
     *
     * @param AdminReturRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(AdminReturRequest $request, User $user)
    {
        return $this->userManajementService->updateUser(
            request: $request,
            user: $user,
            message: 'Admin Retur',
            redirectRouteName: 'admin.admin-retur.index'
        );
    }

    /**
     * Remove the specified admin retur from storage
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Admin Retur',
            redirectRouteName: 'admin.admin-retur.index'
        );
    }
}
