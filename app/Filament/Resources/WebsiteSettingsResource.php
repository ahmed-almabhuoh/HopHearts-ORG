<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteSettingsResource\Pages;
use App\Filament\Resources\WebsiteSettingsResource\RelationManagers;
use App\Models\WebsiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteSettingsResource extends Resource
{
    protected static ?string $model = WebsiteSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Website Settings - WS -';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Settings')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->required()
                            ->maxLength(100)
                            ->default('My Website')
                            ->label('Site Name'),

                        Forms\Components\TextInput::make('site_logo')
                            ->nullable()
                            ->label('Site Logo'),

                        Forms\Components\TextInput::make('contact_email')
                            ->nullable()
                            ->email()
                            ->label('Contact Email'),

                        Forms\Components\TextInput::make('phone_number')
                            ->nullable()
                            ->maxLength(20)
                            ->label('Phone Number'),

                        Forms\Components\Textarea::make('address')
                            ->nullable()
                            ->label('Address')
                            ->columnSpan('full'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Social Media & About Us')
                    ->schema([
                        Forms\Components\Textarea::make('social_media_links')
                            ->nullable()
                            ->rows(3)
                            ->helperText('Enter social media links in JSON format (e.g., ["facebook" => "https://facebook.com", "twitter" => "https://twitter.com"])')
                            ->label('Social Media Links'),

                        Forms\Components\RichEditor::make('about_us')
                            ->nullable()
                            ->label('About Us'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Maintenance Mode')
                    ->schema([
                        Forms\Components\Toggle::make('is_maintenance_mode')
                            ->default(false)
                            ->label('Maintenance Mode'),

                        Forms\Components\TextInput::make('maintenance_message')
                            ->nullable()
                            ->label('Maintenance Message'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('site_name')
                    ->sortable()
                    ->searchable()
                    ->label('Site Name'),

                Tables\Columns\TextColumn::make('contact_email')
                    ->sortable()
                    ->searchable()
                    ->label('Contact Email'),

                Tables\Columns\TextColumn::make('phone_number')
                    ->sortable()
                    ->label('Phone Number'),

                Tables\Columns\BooleanColumn::make('is_maintenance_mode')
                    ->label('Maintenance Mode'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated At'),
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
            'index' => Pages\ListWebsiteSettings::route('/'),
            'create' => Pages\CreateWebsiteSettings::route('/create'),
            'edit' => Pages\EditWebsiteSettings::route('/{record}/edit'),
        ];
    }
}
