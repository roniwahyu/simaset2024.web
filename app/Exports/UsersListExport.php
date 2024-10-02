<?php 

namespace App\Exports;
use App\Models\Users;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class UsersListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Users::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Fullname',
			'Email',
			'Status',
			'City',
			'Phone',
			'Role',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->fullname,
			$record->email,
			$record->status,
			$record->city,
			$record->phone,
			$record->role,
			$record->created_at,
			$record->updated_at
        ];
    }
}
