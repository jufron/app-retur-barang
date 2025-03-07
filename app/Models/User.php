<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,
        Notifiable,
        HasRoles,
        DateFormatCreatedAttAndUpdatedAt;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user profile associated with the user.
     */
    public function userProfile() : HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the barang rusak associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangRusak () : HasMany
    {
        return $this->hasMany(BarangRusak::class);
    }

    /**
     * Get all of the dataLogistik for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataLogistik(): HasMany
    {
        return $this->hasMany(DataLogistik::class);
    }
}
