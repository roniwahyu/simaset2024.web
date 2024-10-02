<?php 

namespace App\Exports;
use App\Models\CoreRoles;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CorerolesListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(CoreRoles::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Role Id',
			'Role Name',
			'Description',
			'Isactive',
			'Userid',
			'Created',
			'Modified',
			'Deleted',
			'Key',
			'Date Created',
			'Date Updated'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->role_id,
			$record->role_name,
			$record->description,
			$record->isactive,
			$record->userid,
			$record->created,
			$record->modified,
			$record->deleted,
			$record->key,
			$record->date_created,
			$record->date_updated
        ];
    }
}
