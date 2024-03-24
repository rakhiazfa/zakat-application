<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ZakatMaalExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $users = User::role('Amil Zakat')->get();

        foreach($users as $key => $user) {
            $sheets[] = new ZakatMaalSheet($user->id, 'RT ' . ($key + 1));
        }

        return $sheets;
    }
}
