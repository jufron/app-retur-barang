<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\{ User, UserProfile };
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Services\Contract\UserManajementServiceInterface;

class UserManajementService implements UserManajementServiceInterface
{
    /**
     * Get users with specific role
     *
     * @param string $roleName
     * @return \Illuminate\Support\Collection
     */
    public function getUser (string $roleName) : Collection
    {
        $users = User::with([
            'roles'        => fn(MorphToMany $query) => $query->select('id', 'name'),
            'userProfile' => fn(HasOne  $query) => $query->select('id', 'user_id', 'telepon', 'foto'),
            ])
            ->whereHas('roles', function(Builder $query) use ($roleName) {
                $query->where('name', $roleName);
            })
            ->when($roleName === 'admin-retur', function (Builder $query) {
                $query->where('id', '!=', auth()->id());
            })
            ->get()
            ->map(function($user) {
                if (!isset($user->userProfile)) {
                    $user->userProfile = new UserProfile([
                        'user_id'   => $user->id,
                        'telepon'   => 'Tidak Ada',
                        'foto'      => 'Tidak Ada'
                    ]);
                }
                return $user;
            });

        return $users;
    }

    /**
     * Create a new user with role
     *
     * @param \Illuminate\Http\Request $request
     * @param string $roleName
     * @param string $message
     * @param string $redirectRouteName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUser (Request $request, string $roleName, string $message, string $redirectRouteName) : RedirectResponse
    {
        $foto = null;

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-profile', 'public');
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'name'      => $request->name,
                'username'  => $request->username,
                'email'     => $request->email,
                'password'  => $request->password,
            ]);

            $userId = $user->id;

            UserProfile::create([
                'user_id'   => $userId,
                'telepon'   => $request->telepon,
                'foto'      => $foto
            ]);

            $user->assignRole($roleName);

            DB::commit();

            notify()->success("Berhasil Menambahkan {$message} Baru");
            return redirect()->route($redirectRouteName);
        } catch (\Exception $e) {

            DB::rollBack();

            logger()->error($e->getMessage());
            notify()->error("Gagal Menambahkan {$message} Baru");
            return redirect()->route($redirectRouteName);
        }
    }

    /**
     * Show user details
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function showUser (User $user) : JsonResponse
    {
        $user = $user->load([
            'roles'         => fn(MorphToMany $query) => $query->select('id', 'name'),
            'userProfile'   => fn(HasOne $query) => $query->select('id', 'user_id', 'telepon', 'foto'),
        ]);

        if (!$user) {
            return response()->json(null, 404);
        }

        return response()->json([
            'name'          => $user->name,
            'username'      => $user->username,
            'email'         => $user->email,
            'rolle'         => $user->getRoleNames(),
            'foto'          => $user->userProfile && $user->userProfile->foto
                                ? asset('storage/' . $user->userProfile->foto)
                                : asset('img/blank-profile-picture-973460_1280.png'),
            'telepon'       => $user->userProfile && $user->userProfile->telepon
                                ? $user->userProfile->telepon
                                : 'Tidak Ada',
            'created_at'    => $user->created_at,
            'updated_at'    => $user->updated_at
        ], 200);
    }

    /**
     * Get user for editing
     *
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public function edit (User $user) : User
    {
        return $user->load([
            'roles'         => fn(MorphToMany $query) => $query->select('id', 'name'),
            'userProfile'   => fn(HasOne  $query) => $query->select('id', 'user_id', 'telepon', 'foto'),
        ]);
    }

    /**
     * Update user details
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param string $message
     * @param string $redirectRouteName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser (Request $request, User $user, string $message, string $redirectRouteName) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $userProfile = $user->userProfile ?? new UserProfile(['user_id' => $user->id]);

            if ($request->hasFile('foto')) {
                // Check if a new photo file was uploaded

                if ($userProfile->foto) {
                    // If user already has an existing photo, delete it from storage
                    Storage::disk('public')->delete($userProfile->foto);
                }
                // Store the new uploaded photo in public storage under images/admin-retur directory
                $foto = $request->file('foto')->store('foto-profile', 'public');
            } else {
                // If no new photo uploaded, keep the existing photo
                $foto = $userProfile->foto;
            }

            $user->update([
                'name'      => $request->name,
                'username'  => $request->username,
                'email'     => $request->email,
            ]);

            if ($request->filled('password')) {
                $user->update(['password' => $request->password]);
            }

            // Update atau buat userProfile
            $userProfile->fill([
                'telepon' => $request->telepon,
                'foto'    => $foto,
            ]);
            $userProfile->save();

            DB::commit();

            notify()->success("Berhasil Mengupdate {$message}");
            return redirect()->route($redirectRouteName);
        } catch (\Exception $e) {
            DB::rollBack();

            logger()->error($e->getMessage());
            notify()->error("Gagal Mengupdate {$message}");
            return redirect()->route($redirectRouteName);
        }
    }

    /**
     * Delete user
     *
     * @param \App\Models\User $user
     * @param string $message
     * @param string $redirectRouteName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyUser (User $user, string $message, string $redirectRouteName) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            // Delete photo from storage if exists
            if ($user->userProfile && $user->userProfile->foto) {
                Storage::disk('public')->delete($user->userProfile->foto);
            }

            // Delete user profile
            if ($user->userProfile) {
                $user->userProfile->delete();
            }

            // Delete user roles
            $user->roles()->detach();

            // Delete user
            $user->delete();

            DB::commit();

            notify()->success("Berhasil Mengupdate {$message}");
            return redirect()->route($redirectRouteName);
        } catch (\Exception $e) {
            DB::rollBack();

            logger()->error($e->getMessage());
            notify()->error("Gagal Mengupdate {$message}");
            return redirect()->route($redirectRouteName);
        }
    }
}
