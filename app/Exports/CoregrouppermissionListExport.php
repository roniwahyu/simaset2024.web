<?php 

namespace App\Exports;
use App\Models\CoreGroupPermission;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoregrouppermissionListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(CoreGroupPermission::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Group Id',
			'Permission Id'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->group_id,
			$record->permission_id
        ];
    }
}
