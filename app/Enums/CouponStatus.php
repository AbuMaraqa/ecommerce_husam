<?php

namespace App\Enums;

enum CouponStatus: int
{
    case ACTIVE = 1;
    case EXPIRED = 2;
    case DISABLED = 3;

    // دالة لإرجاع التسمية النصية
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'مفعل',
            self::EXPIRED => 'منتهي',
            self::DISABLED => 'معطل',
        };
    }

    public static function toArray(): array
{
    return array_column(
        array_map(
            fn($case) => ['key' => $case->value, 'label' => $case->label()],
            self::cases()
        ),
        'label',
        'key'
    );
}

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::EXPIRED => 'danger',
            self::DISABLED => 'warning',
        };
    }
}
