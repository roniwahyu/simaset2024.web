<?php 

namespace App\Exports;
use App\Models\CoreGroupUser;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoregroupuserViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(CoreGroupUser::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("user_id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Group Id',
			'User Id'
        ];
    }


    public function map($record): array
    {
        return [
			$record->group_id,
			$record->user_id
        ];
    }
}
