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
    /**
     * @var UserManajementServiceInterface
     */
    protected UserManajementServiceInterface $userManajementService;

    /**
     * Constructor for LogistikController
     *
     * @param UserManajementServiceInterface $userManajementService
     */
    public function __construct (UserManajementServiceInterface $userManajementService)
    {
        $this->userManajementService = $userManajementService;
    }

    /**
     * Display a listing of logistik users
     *
     * @return View
     */
    public function index() : View
    {
        $users = $this->userManajementService->getUser('logistik');
        return view('dashboard.admin.logistik-manajement.index', compact('users'));
    }

    /**
     * Show the form for creating a new logistik user
     *
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.admin.logistik-manajement.create');
    }

    /**
     * Store a newly created logistik user
     *
     * @param AdminReturRequest $request
     * @return RedirectResponse
     */
    public function store(AdminReturRequest $request) : RedirectResponse
    {
        return $this->userManajementService->createUser(
            request: $request,
            roleName: 'logistik',
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }

    /**
     * Display the specified logistik user
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return $this->userManajementService->showUser($user);
    }

    /**
     * Show the form for editing the specified logistik user
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        return view('dashboard.admin.logistik-manajement.edit', [
            'user' => $this->userManajementService->edit($user)
        ]);
    }

    /**
     * Update the specified logistik user
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
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }

    /**
     * Remove the specified logistik user
     *
     * @param User $user
     * @return mixed
     */
    public function destroy(User $user)
    {
        return $this->userManajementService->destroyUser(
            user: $user,
            message: 'Logistik',
            redirectRouteName: 'admin.logistik-manajement.index'
        );
    }
}
