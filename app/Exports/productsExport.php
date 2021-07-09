<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class productsExport implements FromCollection, WithHeadings , WithMapping , WithColumnWidths , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $product=Product::all();
        return $product;
    }


    public function map($product): array
    {
        $index=0;
        $date=($product->created_at);
        return [
            $product->id,
            
            ucwords($product->user_id),
            ucwords($product->category->name),
            ucwords($product->name),
            ucwords($product->info),
            ucwords($product->status_value),
           
            date_format($date,"d/ m / y  H:i:s A")
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'E' => 20,
            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            
            'id',
            'User',
            'Category',
            'Name',
            'Description',
            'Status',
            'Created On',
        ];
    }
}








    
