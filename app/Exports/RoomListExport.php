<?php 

namespace App\Exports;
use App\Models\Room;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class RoomListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Room::exportListFields());
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
			'Updated At',
			'Building Id'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->name,
			$record->description,
			$record->created_at,
			$record->updated_at,
			$record->building_id
        ];
    }
}
