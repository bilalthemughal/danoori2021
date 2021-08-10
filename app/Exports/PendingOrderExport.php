<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendingOrderExport implements FromCollection,WithHeadings
{ 
    public function headings():array{
        return[
            'ConsigneeName',
            'ConsigneeAddress',
            'ConsigneeMobileNumber',
            'ConsigneeEmail',
            'DestinationCity',
            'Pieces',
            'Weight',
            'CODAmount',
            'CustomerReferenceNumber',
            'SpecialHandling',
            'ServiceType',
            'ProductDetails',
            'Remarks'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::where('status', Order::IS_PENDING)->select(['name','address','phone_number','email','city',DB::raw('"1" as Pieces') , DB::raw('"0.6" as Weight'),'total',DB::raw('"DON-123" as CustomerReferenceNumber'),DB::raw('"No" as SpecialHandling'),DB::raw('"Overnight" as ServiceType'),DB::raw('"clothes" as ProductDetails'),'order_note'])->get();
    }
}
