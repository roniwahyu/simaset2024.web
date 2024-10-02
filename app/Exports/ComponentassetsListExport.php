<?php 

namespace App\Exports;
use App\Models\ComponentAssets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ComponentassetsListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(ComponentAssets::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Assetid',
			'Componentid',
			'Quantity',
			'Created At',
			'Updated At',
			'Status',
			'Date'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->assetid,
			$record->componentid,
			$record->quantity,
			$record->created_at,
			$record->updated_at,
			$record->status,
			$record->date
        ];
    }
}
