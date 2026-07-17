<?php

namespace App\Filament\Resources\UnitModelResource\Pages;

use App\Filament\Resources\UnitModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUnitModels extends ManageRecords
{
    protected static string $resource = UnitModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
