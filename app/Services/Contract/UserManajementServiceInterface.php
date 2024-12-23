<?php

namespace App\Services\Contract;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

interface UserManajementServiceInterface 
{
    public function getUser (string $roleName) : Collection;
    
    public function createUser (Request $request, string $roleName, string $message, string $redirectRouteName) : RedirectResponse;
    
    public function showUser (User $user) : JsonResponse;

    public function edit (User $user) : User;

    public function updateUser (Request $request, User $user, string $message, string $redirectRouteName) : RedirectResponse;

    public function destroyUser (User $user, string $message, string $redirectRouteName) : RedirectResponse;
}