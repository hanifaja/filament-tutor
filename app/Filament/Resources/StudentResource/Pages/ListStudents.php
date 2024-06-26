<?php

namespace App\Filament\Resources\StudentResource\Pages;

use Filament\Actions;
use App\Models\Student;
use App\Models\Students;
use App\Imports\ImportStudents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StudentResource;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeader(): ?view
    {
        $data =  Actions\CreateAction::make();
        return view('filament.custom.upload-file', compact('data'));
    }

    public $file = '';

    public function save(){
        if($this-> file != ''){
            Excel::import(new ImportStudents, $this->file);
        }
        // Student::create([
        //     'nis' => '1030',
        //     'name' => 'Coba kuy',
        //     'gender' => 'Male',
        // ]);
    }
}
