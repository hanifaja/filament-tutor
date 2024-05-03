<?php

namespace App\Filament\Resources;

use livewire;
use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Pages\ListStudents;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Contracts\HasTable;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nis')
                                    ->label('NIS'),
                        TextInput::make('name')
                                    ->label('Name')
                                    ->required(),
                        Select::make('gender')
                                    ->options([
                                        "Male" => "Male",
                                        "Woman" => "Woman"
                                    ]),
                        DatePicker::make('birthday')
                                    ->label('Birthday'),
                        Select::make('religion')
                                    ->options([
                                        "Islam" => "Islam",
                                        "Kristen" => "Kristen",
                                        "Konghucu" => "Konghucu",
                                        "Protestan" => "Protestan",
                                        "Jawa" => "Jawa",
                                    ]),
                        TextInput::make('contact'),
                        FileUpload::make('profile')
                                    ->directory("Students"),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                        TextColumn::make('no')
                                    ->rowIndex(),              
                        TextColumn::make('nis')
                                    ->label('NIS'),
                        TextColumn::make('name')
                                    ->label('Name'),
                        TextColumn::make('gender'),
                        TextColumn::make('birthday')
                                    ->label('Birthday'),
                        TextColumn::make('religion'),
                        TextColumn::make('contact'),
                        ImageColumn::make('profile')
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
            // ->headerActions([
            //     Tables\Actions\CreateAction::make()
            // ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
