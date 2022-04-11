<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
    protected $table = 'account';
    // protected $filliable = ['UserEmail', 'UserPass', 'UserID', 'AccountID'];

    //Allow massive assignment: the opposition to $filliable.
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}