<?php 

namespace App\Exports;
use App\Models\Employees;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class EmployeesListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Employees::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Departmentid',
			'Fullname',
			'Email',
			'Jobrole',
			'City',
			'Country',
			'Address',
			'Created At',
			'Updated At'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->departmentid,
			$record->fullname,
			$record->email,
			$record->jobrole,
			$record->city,
			$record->country,
			$record->address,
			$record->created_at,
			$record->updated_at
        ];
    }
}
