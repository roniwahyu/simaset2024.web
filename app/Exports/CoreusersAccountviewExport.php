<?php 

namespace App\Exports;
use App\Models\CoreUsers;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CoreusersAccountviewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(CoreUsers::exportAccountviewFields());
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
			'Ip Address',
			'Username',
			'Email',
			'Email Login Hash',
			'Activation Selector',
			'Activation Code',
			'Remember Selector',
			'Remember Code',
			'Created On',
			'Last Login',
			'Active',
			'First Name',
			'Last Name',
			'Company',
			'Phone',
			'Oauth Provider',
			'Oauth Uid',
			'Created',
			'Nim',
			'Claimed',
			'Wa Activated',
			'Email Activated',
			'Activated',
			'Otp',
			'Otp Login Code',
			'Otp Backup Code',
			'User Role Id',
			'Date Created',
			'Date Updated',
			'User Group Id'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->ip_address,
			$record->username,
			$record->email,
			$record->email_login_hash,
			$record->activation_selector,
			$record->activation_code,
			$record->remember_selector,
			$record->remember_code,
			$record->created_on,
			$record->last_login,
			$record->active,
			$record->first_name,
			$record->last_name,
			$record->company,
			$record->phone,
			$record->oauth_provider,
			$record->oauth_uid,
			$record->created,
			$record->nim,
			$record->claimed,
			$record->wa_activated,
			$record->email_activated,
			$record->activated,
			$record->otp,
			$record->otp_login_code,
			$record->otp_backup_code,
			$record->user_role_id,
			$record->date_created,
			$record->date_updated,
			$record->user_group_id
        ];
    }
}
