<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'address',
        'status',
        'current_role_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => UserStatus::class
    ];

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Return the label of the user status.
     *
     * @return string
     */
    /******  74f336e0-da95-4e60-9955-254a0fc47819  *******/
    public function getStatus(): string
    {
        // لا حاجة لاستخدام UserStatus::from هنا بعد إضافة الـ cast
        return $this->status->label();
    }

    public function getStatusBadge(): string
    {
        // Since 'status' is already cast to CategoryStatus, use it directly
        $status = $this->status;

        // If $status is null, fall back to a default value
        if (!$status) {
            $status = UserStatus::INACTIVE; // Default fallback
        }

        return <<<HTML
            <span class="badge {$status->badgeClass()}">{$status->label()}</span>
        HTML;
    }

    public function currentRole()
    {
        return $this->belongsTo(Role::class, 'current_role_id');
    }

}
