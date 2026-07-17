<?php

namespace App\Filament\Resources\EmployeeAssignmentResource\Pages;

use App\Filament\Resources\EmployeeAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEmployeeAssignments extends ManageRecords
{
    protected static string $resource = EmployeeAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
