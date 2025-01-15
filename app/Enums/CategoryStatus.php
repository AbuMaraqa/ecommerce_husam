<?php

namespace App\Enums;

enum CategoryStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;

    // دالة لإرجاع التسمية النصية
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'مفعل',
            self::INACTIVE => 'غير مفعل',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::ACTIVE => 'rounded-pill bg-label-success',  // أخضر
            self::INACTIVE => 'rounded-pill bg-label-danger', // رمادي
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::ACTIVE => 'bx bx-check',
            self::INACTIVE => 'bx bx-x',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger',
        };
    }

    public function class(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger',
        };
    }
}
