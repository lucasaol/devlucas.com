<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;


enum Proficiency: string implements HasLabel, HasColor, HasIcon
{
    case Basic = 'basic';
    case Intermediate = 'intermediate';
    case Technical = 'technical';
    case Advanced = 'advanced';
    case Fluent = 'fluent';
    case Native = 'native';

    public function getLabel(): string
    {
        return match ($this) {
            self::Basic => 'Básico',
            self::Intermediate => 'Intermediário',
            self::Technical => 'Técnico',
            self::Advanced => 'Avançado',
            self::Fluent => 'Fluente',
            self::Native => 'Nativo'
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Basic => 'danger',
            self::Intermediate => 'warning',
            self::Technical, self::Advanced => 'info',
            self::Fluent, self::Native => 'success'
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Basic => 'heroicon-o-arrow-trending-up',
            self::Intermediate => 'heroicon-o-chart-bar',
            self::Technical => 'heroicon-o-adjustments-horizontal',
            self::Advanced => 'heroicon-o-check-badge',
            self::Fluent => 'heroicon-o-chat-bubble-left-right',
            self::Native => 'heroicon-m-sparkles'
        };
    }

}
