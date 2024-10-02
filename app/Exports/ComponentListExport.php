<?php 

namespace App\Exports;
use App\Models\Component;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ComponentListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Component::exportListFields());
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
			'Checkstatus'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->supplierid,
			$record->typeid,
			$record->brandid,
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
			$record->checkstatus
        ];
    }
}
