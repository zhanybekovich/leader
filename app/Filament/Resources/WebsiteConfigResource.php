<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteConfigResource\Pages;
use App\Filament\Resources\WebsiteConfigResource\RelationManagers;
use App\Models\WebsiteConfig;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\DatePathGenerator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteConfigResource extends Resource
{
    protected static ?string $model = WebsiteConfig::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $modelLabel = 'Общие настройки';

    protected static ?string $pluralModelLabel = 'Общие настройки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('company_name')
                        ->required()
                        ->maxLength(255)
                        ->default('Общественное Объединение Центр Гражданских Инициатив "Лидер"')
                        ->label('Название компании'),
                    Forms\Components\TextInput::make('company_slogan')
                        ->maxLength(255)
                        ->label('Слоган компании'),
                    TiptapEditor::make('company_description')
                        ->extraInputAttributes([
                            'style' => 'min-height: 500px',
                        ])
//                        ->disableFloatingMenus()
                        ->disableBubbleMenus()
                        ->label('Описание компании'),
                    Forms\Components\TextInput::make('company_address')
                        ->maxLength(255)
                        ->label('Адрес компании'),
                    Forms\Components\TextInput::make('company_phone')
                        ->tel()
                        ->maxLength(255)
                        ->label('Телефон компании'),
                    Forms\Components\TextInput::make('company_email')
                        ->email()
                        ->maxLength(255)
                        ->label('Email компании'),
                    CuratorPicker::make('company_logo')
                        ->pathGenerator(DatePathGenerator::class)
                        ->preserveFilenames(true)
                        ->label('Логотип'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('company_logo'),
                Tables\Columns\TextColumn::make('company_name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated(false);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebsiteConfigs::route('/'),
            'create' => Pages\CreateWebsiteConfig::route('/create'),
            'edit' => Pages\EditWebsiteConfig::route('/{record}/edit'),
        ];
    }
}
