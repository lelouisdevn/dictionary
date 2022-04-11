<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = ['UserID', 'UserName', 'UserRole'];
    protected $primaryKey = 'UserID';

    public function accounts(){
        return $this->hasOne(Account::class);
    }
}
 