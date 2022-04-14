<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
    protected $table = 'account';
    // protected $filliable = ['UserEmail', 'UserPass', 'UserID', 'AccountID'];

    //Allow massive assignment: the opposition to $filliable.
    protected $guarded = [];

    public static function getLastAccountID (){
		// Get the last AccountID
		$id = Account::max('AccountID');

		$AccountID = 0;
		if ($id != null){
			$AccountID = $id;
		}else {
			$AccountID = 0;
		}
		return $AccountID;
	}

    public function user(){
        return $this->belongsTo(User::class);
    }
}