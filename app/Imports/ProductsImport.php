<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new Product([
            'name' => $row['products'],
            'type' => $row['type'],
            'quantity' => $row['qty'],
            'user_id' => Auth::id()
        ]);
    }
}
