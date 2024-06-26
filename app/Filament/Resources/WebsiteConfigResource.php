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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteConfigResource extends Resource
{
    protected static ?string $model = WebsiteConfig::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('company_name')
                        ->required()
                        ->maxLength(255)
                        ->default('Общественное Объединение Центр Гражданских Инициатив "Лидер"'),
                    Forms\Components\TextInput::make('company_slogan')
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('company_description')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('company_address')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('company_phone')
                        ->tel()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('company_email')
                        ->email()
                        ->maxLength(255),
                    CuratorPicker::make('company_logo')
                        ->pathGenerator(DatePathGenerator::class)
                        ->preserveFilenames(true),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_slogan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
            ]);
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
