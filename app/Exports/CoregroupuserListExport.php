<?php 

namespace App\Exports;
use App\Models\CoreGroupUser;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoregroupuserListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(CoreGroupUser::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
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
