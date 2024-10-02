<?php 

namespace App\Exports;
use App\Models\Settings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class SettingsListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Settings::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Company',
			'Address',
			'Email',
			'Phonenumber',
			'Country',
			'Logo',
			'Formatdate',
			'Created At',
			'Updated At',
			'Currency',
			'Language'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->id,
			$record->company,
			$record->address,
			$record->email,
			$record->phonenumber,
			$record->country,
			$record->logo,
			$record->formatdate,
			$record->created_at,
			$record->updated_at,
			$record->currency,
			$record->language
        ];
    }
}
