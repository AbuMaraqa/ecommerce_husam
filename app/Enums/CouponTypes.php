<?php

namespace App\Enums;

enum CouponTypes: int
{
    case FIXED = 1;
    case PERCENTAGE = 2;

    // دالة لإرجاع التسمية النصية
    public function label(): string
    {
        return match ($this) {
            self::FIXED => 'ثابت',
            self::PERCENTAGE => 'نسبة مئوية',
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
            self::FIXED => 'success',
            self::PERCENTAGE => 'danger',
        };
    }
}
