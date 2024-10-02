<?php 

namespace App\Exports;
use App\Models\AssetHistory;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AssethistoryListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(AssetHistory::exportListFields());
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
			'Employeeid',
			'Date',
			'Status',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->assetid,
			$record->employeeid,
			$record->date,
			$record->status,
			$record->created_at,
			$record->updated_at
        ];
    }
}
