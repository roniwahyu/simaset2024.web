<?php 

namespace App\Exports;
use App\Models\CorePermissions;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CorepermissionsViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(CorePermissions::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Id',
			'Id Role',
			'Name',
			'Permission',
			'Action',
			'Isactive',
			'Create',
			'Read',
			'Update',
			'Delete',
			'Setup',
			'Report',
			'Print',
			'Export',
			'Import',
			'Upload',
			'Download',
			'Backup',
			'Restore',
			'User Dashboard',
			'Admin Dashboard',
			'Validation',
			'Userid',
			'Created',
			'Modified',
			'Date Created',
			'Date Updated'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->id_role,
			$record->name,
			$record->permission,
			$record->action,
			$record->isactive,
			$record->create,
			$record->read,
			$record->update,
			$record->delete,
			$record->setup,
			$record->report,
			$record->print,
			$record->export,
			$record->import,
			$record->upload,
			$record->download,
			$record->backup,
			$record->restore,
			$record->user_dashboard,
			$record->admin_dashboard,
			$record->validation,
			$record->userid,
			$record->created,
			$record->modified,
			$record->date_created,
			$record->date_updated
        ];
    }
}
