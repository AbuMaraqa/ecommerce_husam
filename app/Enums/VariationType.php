<?php

namespace App\Enums;

enum VariationType: int
{
    case RADIO_BUTTON = 1;
    case IMAGE = 2;
    case COLOR = 3;
    case BUTTON = 3;
    case SELECT = 3;

    // دالة لإرجاع التسمية النصية
    public function label(): string
    {
        return match ($this) {
            self::RADIO_BUTTON => 'Radio Button',
            self::IMAGE => 'Image',
            self::COLOR => 'Color',
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
            self::RADIO_BUTTON => 'Radio Button',
            self::IMAGE => 'Image',
            self::COLOR => 'Color',
        };
    }
}
