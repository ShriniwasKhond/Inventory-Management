<?php
namespace App\Exports;
use App\Models\ProductHistory;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductHistoryExport implements WithHeadings,FromCollection
{
    

    public function headings(): array
    {
        return [
            'Id',
            'UserName',
            'Asset Number',
            'Asset Name',
            'Original Qty',
            'Updated Qty',
        ];
    }

    public function collection()
    {
         return collect(ProductHistory::getDecoration());
    }
    
    

}
