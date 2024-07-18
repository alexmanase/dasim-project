<?php

namespace App\Filament\Resources;

use App\Enums\CargoTypeEnum;
use App\Enums\TruckTypeEnum;
use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('client_name')
                ->maxLength(255)
                ->required()
            ,

            Section::make('Loading')->schema([
                DatePicker::make('loading_date')
                    ->required()
                ,

                Grid::make(2)->schema([
                    TextInput::make('loading_country')
                        ->required()
                    ,

                    TextInput::make('loading_location')
                        ->required()
                    ,
                ]),

                Grid::make(2)->schema([
                    TextInput::make('loading_street')
                        ->required()
                    ,

                    TextInput::make('loading_number')
                        ->numeric()
                        ->required()
                    ,
                ]),

                Grid::make(2)->schema([
                    Textarea::make('loading_extra_details')
                        ->rows(3)
                    ,

                    Textarea::make('loading_additional_charging_points')
                        ->rows(3)
                    ,
                ]),
            ]),

            Section::make('Unloading')->schema([
                DatePicker::make('maximum_date_for_unload')
                    ->required()
                ,

                Grid::make(2)->schema([
                    TextInput::make('unloading_country')
                        ->required()
                    ,

                    TextInput::make('unloading_location')
                        ->required()
                    ,
                ]),

                Grid::make(2)->schema([
                    TextInput::make('unloading_street')
                        ->required()
                    ,

                    TextInput::make('unloading_number')
                        ->numeric()
                        ->required()
                    ,
                ]),

                Grid::make(2)->schema([
                    Textarea::make('unloading_extra_details')
                        ->rows(3)
                    ,

                    Textarea::make('unloading_additional_charging_points')
                        ->rows(3)
                    ,
                ]),
            ]),

            Select::make('type_of_cargo')
                ->required()
                ->multiple()
                ->options(CargoTypeEnum::class)
            ,

            TextInput::make('tonnage')
                ->required()
                ->numeric()
                ->minValue(1)
            ,

            TextInput::make('volume')
                ->required()
                ->numeric()
                ->minValue(1)
            ,

            TextInput::make('length_of_storage')
            ,

            Select::make('truck_type')
                ->required()
                ->enum(TruckTypeEnum::class)
                ->options(TruckTypeEnum::class)
            ,

            TextInput::make('value')
                ->required()
            ,

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_name')
                    ->toggleable()
                ,

                TextColumn::make('loading_date')
                    ->date()
                    ->toggleable()
                ,

                TextColumn::make('loading_country')
                    ->toggleable()
                ,

                TextColumn::make('unloading_country')
                    ->toggleable()
                ,

                TextColumn::make('type_of_cargo')
                    ->badge()
                    ->toggleable()
                ,

                TextColumn::make('truck_type')
                    ->toggleable()
                ,

                TextColumn::make('value')
                    ->money('EUR')
                    ->toggleable()
                ,
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
