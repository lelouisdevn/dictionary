<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {
    protected $table = 'bookmark';
    // protected $filliable = ['BookmarkID', 'UserID', 'Word'];

    //Allow massive assignment: the opposition to $filliable.
    protected $guarded = [];

    public static function getLastBmID() {
        $id = Bookmark::max('BookmarkID');

        if ($id != null){
            return $id;
        }else {
            return 0;
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}