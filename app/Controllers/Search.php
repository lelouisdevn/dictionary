<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Database\Capsule\Manager as DB;

Class Search extends Controller {

    public function addToWordlist(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])){
            $data['word'] = $_POST['word'];
            $word = $data['word'];

            $BookmarkID = DB::table('bookmark')
            ->where('Word', $word)
            ->where('UserID', $_SESSION['user'])
            ->first();

            // echo json_encode($BookmarkID->BookmarkID);
            if ($BookmarkID) {
                DB::table('bookmark')
                ->where('BookmarkID', json_encode($BookmarkID->BookmarkID))
                ->delete();
                echo $BookmarkID;
            }else {
                // bookmarkid = last + 1;
                $bookmark = new Bookmark;
                $BookmarkID = $bookmark->getLastBmID() + 1;
                // echo $BookmarkID;

                // thêm một bookmark với userid, bookmarkid và từ được tìm kiếm.
                Bookmark::create([
                    'UserID' => $_SESSION['user'],
                    'BookmarkID' => $BookmarkID,
                    'Word' => $word
                ]);
            }
        }
    }

    public function wordIsLiked(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])){
            $data['word'] = $_POST['word'];
            $word = $data['word'];

            $BookmarkID = DB::table('bookmark')
            ->where('Word', $word)
            ->where('UserID', $_SESSION['user'])
            ->first();

            // echo json_encode($BookmarkID->BookmarkID);
            if ($BookmarkID) {
                echo 1;
            }
        }
    }
}