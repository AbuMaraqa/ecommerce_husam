<?php

namespace App\Enums;

enum UserStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;
    case SUSPENDED = 3;

    // دالة لإرجاع التسمية النصية
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'مفعل',
            self::INACTIVE => 'غير مفعل',
            self::SUSPENDED => 'معلق',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::ACTIVE => 'rounded-pill bg-label-success',  // أخضر
            self::INACTIVE => 'rounded-pill bg-label-danger', // رمادي
            self::SUSPENDED => 'rounded-pill bg-label-warning', // أصفر
        };
    }
}
