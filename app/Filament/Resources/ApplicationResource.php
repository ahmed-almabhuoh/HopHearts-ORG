<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Content Management - CM -';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Application Details')
                    ->schema([

                        TextInput::make('name')
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->required(),

                        Select::make('job_id')
                            ->label('Job')
                            ->relationship('job', 'title')
                            ->required()
                            ->searchable(),

                        Select::make('user_id')
                            ->label('Applicant')
                            ->relationship('user', 'name')
                            ->required()
                            ->searchable(),

                        MarkdownEditor::make('cover_letter')
                            ->label('Cover Letter')
                            ->nullable()
                            ->columnSpanFull(),

                        FileUpload::make('resume')
                            ->label('Resume')
                            ->placeholder('Enter file path or upload')
                            ->nullable()
                            ->downloadable()
                            ->fetchFileInformation(true)
                            ->previewable(true)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Application Status')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'reviewed' => 'Reviewed',
                                'accepted' => 'Accepted',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job.title')
                    ->label('Job Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Applicant Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('cover_letter')
                    ->label('Cover Letter')
                    ->limit(50)
                    ->toggleable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'accepted',
                        'warning' => 'reviewed',
                        'danger' => 'rejected',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Submitted On')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter by Status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
