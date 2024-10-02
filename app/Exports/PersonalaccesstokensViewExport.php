<?php 

namespace App\Exports;
use App\Models\PersonalAccessTokens;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class PersonalaccesstokensViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(PersonalAccessTokens::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("", $this->rec_id);
    }


	public function headings(): array
    {
        return [

        ];
    }


    public function map($record): array
    {
        return [

        ];
    }
}
