<?php 

namespace App\Exports;
use App\Models\CoreGroupPermission;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoregrouppermissionViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(CoreGroupPermission::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("permission_id", $this->rec_id);
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
