<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Content Management - CM -';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Project Name'),

                        Forms\Components\Textarea::make('description')
                            ->nullable()
                            ->label('Description'),

                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                            ])
                            ->default('pending')
                            ->label('Status'),

                        // Single media upload for project (image only)
                        FileUpload::make('image')
                            ->label('Upload Project Image')
                            ->image() // For images only
                            ->editableSvgs()
                            ->imageEditor()
                            ->columnSpan('full'),
                    ]),

                Forms\Components\Section::make('Project Dates')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->nullable()
                            ->label('Start Date'),

                        Forms\Components\DatePicker::make('end_date')
                            ->nullable()
                            ->label('End Date'),
                    ]),

                Forms\Components\Section::make('Project Management')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name') // Adjust 'user' to your actual relationship name
                            ->required()
                            ->searchable()
                            ->label('Assigned User'),

                        Forms\Components\TextInput::make('budget')
                            ->numeric()
                            ->nullable()
                            ->label('Budget'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Project Name'),

                // Display a single image for the project media
                // Tables\Columns\ImageColumn::make('media.first.url')->label('Project Image'),
                ImageColumn::make('image'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->label('Description'),

                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->label('Status'),

                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->label('Start Date'),

                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->label('End Date'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Assigned User'),

                Tables\Columns\TextColumn::make('budget')
                    ->money('usd')
                    ->label('Budget'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated At'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->label('Status'),
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
            // Define relations if there are any
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
