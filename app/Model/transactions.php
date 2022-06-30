<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class transactions extends Model
{
	protected $table = 'transactions';
	public $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'coin', 'is_debit','reason_for_transaction',
    ];
	public function user(){
		return $this->hasOne('App\Model\User','id','pupil_id');
	}
}
