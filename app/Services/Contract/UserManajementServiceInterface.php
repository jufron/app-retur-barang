<?php

namespace App\Services\Contract;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

interface UserManajementServiceInterface
{
    /**
     * Get users by role name
     *
     * @param string $roleName
     * @return Collection
     */
    public function getUser (string $roleName) : Collection;

    /**
     * Create a new user
     *
     * @param Request $request
     * @param string $roleName
     * @param string $message
     * @param string $redirectRouteName
     * @return RedirectResponse
     */
    public function createUser (Request $request, string $roleName, string $message, string $redirectRouteName) : RedirectResponse;

    /**
     * Show user details
     *
     * @param User $user
     * @return JsonResponse
     */
    public function showUser (User $user) : JsonResponse;

    /**
     * Get user for editing
     *
     * @param User $user
     * @return User
     */
    public function edit (User $user) : User;

    /**
     * Update user details
     *
     * @param Request $request
     * @param User $user
     * @param string $message
     * @param string $redirectRouteName
     * @return RedirectResponse
     */
    public function updateUser (Request $request, User $user, string $message, string $redirectRouteName) : RedirectResponse;

    /**
     * Delete user
     *
     * @param User $user
     * @param string $message
     * @param string $redirectRouteName
     * @return RedirectResponse
     */
    public function destroyUser (User $user, string $message, string $redirectRouteName) : RedirectResponse;
}
