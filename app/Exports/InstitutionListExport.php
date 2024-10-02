<?php 

namespace App\Exports;
use App\Models\Institution;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class InstitutionListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Institution::exportListFields());
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
			'Description',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->name,
			$record->description,
			$record->created_at,
			$record->updated_at
        ];
    }
}
