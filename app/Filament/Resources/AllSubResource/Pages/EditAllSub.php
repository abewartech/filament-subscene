<?php

namespace App\Filament\Resources\AllSubResource\Pages;

use App\Filament\Resources\AllSubResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAllSub extends EditRecord
{
    protected static string $resource = AllSubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
