<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Throwable;
use Auth;

class ProductImport implements
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithChunkReading,
    ShouldQueue,
    WithEvents,
    WithCalculatedFormulas
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;


    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
        // dd($row['date']);
        
 // dd($row['uom']);
          // dd($productDate);
          // $productDate =  date('Y-m-d', strtotime($row['date']));
           // dd($productDate);

           if(!empty($row['tag_no']) && !empty($row['qty'])){
            
           // $data['product_date'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d');

//            $productDate  = !empty($data['product_date']) ? $data['product_date'] : '';


            $user = Product::create([
          
                'user_id'      => Auth::user()->id,
                'sheet_no'     => $row['tag_no'],
  //            'product_date' => !empty($productDate) ? $productDate : '',
                'location'     => !empty($row['location']) ? $row['location'] : '',
                'sub_location' => !empty($row['sub_location']) ? $row['sub_location'] : '',
                'item_code'    => !empty($row['date']) ? $row['date'] : '',
                'asset'        => !empty($row['asset']) ? $row['asset'] : '',
                'main_category'=> !empty($row['main_category']) ? $row['main_category'] : '',
                'category'     => !empty($row['sub_category']) ? $row['sub_category'] : '',
                'qty'          => $row['qty'],
                'uom'          => !empty($row['uom']) ? $row['uom'] : '',

            ]);
          
        }
    }


    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users,email']
        ];
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public static function afterImport(AfterImport $event)
    {
    }

    public function onFailure(Failure ...$failure)
    {
    }
}