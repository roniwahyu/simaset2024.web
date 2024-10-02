<?php 

namespace App\Exports;
use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class MaintenanceListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Maintenance::exportListFields());
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
			'Supplierid',
			'Startdate',
			'Enddate',
			'Type',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->assetid,
			$record->supplierid,
			$record->startdate,
			$record->enddate,
			$record->type,
			$record->created_at,
			$record->updated_at
        ];
    }
}
