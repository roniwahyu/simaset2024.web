<?php 

namespace App\Exports;
use App\Models\Assets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AssetsListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Assets::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Supplierid',
			'Typeid',
			'Brandid',
			'Assettag',
			'Name',
			'Serial',
			'Quantity',
			'Purchasedate',
			'Cost',
			'Warranty',
			'Status',
			'Picture',
			'Description',
			'Created At',
			'Updated At',
			'Locationid',
			'Checkstatus',
			'Brand Name',
			'Supplier Name',
			'Assettype Description'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->supplierid,
			$record->typeid,
			$record->brandid,
			$record->assettag,
			$record->name,
			$record->serial,
			$record->quantity,
			$record->purchasedate,
			$record->cost,
			$record->warranty,
			$record->status,
			$record->picture,
			$record->description,
			$record->created_at,
			$record->updated_at,
			$record->locationid,
			$record->checkstatus,
			$record->brand_name,
			$record->supplier_name,
			$record->assettype_description
        ];
    }
}
