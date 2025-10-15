<?php

namespace App\Filament\Dashboard\Clusters\Settings\Resources\SocialMedia;

use App\Filament\Dashboard\Clusters\Settings\Resources\SocialMedia\Pages\ManageSocialMedia;
use App\Filament\Dashboard\Clusters\Settings\SettingsCluster;
use App\Models\SocialMedia;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Guava\IconPicker\Forms\Components\IconPicker;
use Guava\IconPicker\Tables\Columns\IconColumn;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Link;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $cluster = SettingsCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(35),
                IconPicker::make('icon')
                    ->iconsSearchResults(),
                TextInput::make('url')
                    ->url()
                    ->maxLength(255)
                    ->prefixIcon(Heroicon::GlobeAlt),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                IconColumn::make('icon'),
                TextColumn::make('url'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSocialMedia::route('/'),
        ];
    }
}
