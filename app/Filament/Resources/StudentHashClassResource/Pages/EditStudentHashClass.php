<?php

namespace App\Filament\Resources\StudentHashClassResource\Pages;

use App\Filament\Resources\StudentHashClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentHashClass extends EditRecord
{
    protected static string $resource = StudentHashClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
