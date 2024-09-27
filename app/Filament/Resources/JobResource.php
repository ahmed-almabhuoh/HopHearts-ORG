<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Content Management - CM -';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Job Details')
                    ->schema([

                        Select::make('posted_by')
                            ->searchable()
                            ->relationship('poster', 'name')
                            ->required()
                            ->rules(['exists:users,id'])
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            // ->reactive() // Make it reactive to auto-update the slug
                            // ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))) // Auto-update slug when title is typed
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->rules(['required', 'string', 'max:255']),

                        TextInput::make('slug')
                            ->unique(Job::class, 'slug')
                            ->required()
                            ->rules(['required', 'string', 'max:255', 'unique:jobs_advertisement,slug']),

                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->rules(['required', 'string']), // Description is required and must be a string

                        Select::make('type')
                            ->options(Job::TYPE)
                            ->required()
                            ->rules(['required']), // Ensure type is selected

                        Select::make('status')
                            ->options(Job::STATUS)
                            ->required()
                            ->rules(['required']), // Ensure status is selected
                    ])
                    ->columns(2),

                Section::make('Job Information')
                    ->schema([
                        TextInput::make('salary')
                            ->numeric()
                            ->prefix('$')
                            ->placeholder('Enter the salary')
                            ->nullable()
                            ->rules(['nullable', 'numeric', 'min:0']), // Salary is optional, but must be numeric

                        TextInput::make('location')
                            ->placeholder('Job location')
                            ->nullable()
                            ->rules(['nullable', 'string']), // Location is optional

                        DatePicker::make('expiration_date')
                            ->placeholder('Select expiration date')
                            ->nullable()
                            ->columnSpanFull()
                            ->rules(['nullable', 'date', 'after_or_equal:today']), // Expiration date is optional but should be today or later
                    ])
                    ->columns(2), // Organizing input in 2 columns
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),

                TextColumn::make('salary')
                    ->label('Salary')
                    ->sortable()
                    ->money('usd', true), // Assuming salary in USD
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Job Type')
                    ->options(Job::TYPE), // Assuming TYPE is an array or constant from the model

                SelectFilter::make('status')
                    ->label('Job Status')
                    ->options(Job::STATUS), // Assuming STATUS is an array or constant from the model
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
