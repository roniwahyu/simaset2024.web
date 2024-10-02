<?php 

namespace App\Exports;
use App\Models\BrandCategory;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class BrandcategoryViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(BrandCategory::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Id',
			'Name',
			'Description',
			'Created At',
			'Modified At',
			'Parents'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->name,
			$record->description,
			$record->created_at,
			$record->modified_at,
			$record->parents
        ];
    }
}
