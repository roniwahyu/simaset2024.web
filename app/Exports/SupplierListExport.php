<?php 

namespace App\Exports;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class SupplierListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Supplier::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Name',
			'Email',
			'City',
			'Country',
			'Zip',
			'Phone',
			'Address',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->name,
			$record->email,
			$record->city,
			$record->country,
			$record->zip,
			$record->phone,
			$record->address,
			$record->created_at,
			$record->updated_at
        ];
    }
}
