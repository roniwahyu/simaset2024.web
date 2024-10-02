<?php 

namespace App\Exports;
use App\Models\CoreGroupRole;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoregrouproleListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(CoreGroupRole::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Group Id',
			'Role Id'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->group_id,
			$record->role_id
        ];
    }
}
