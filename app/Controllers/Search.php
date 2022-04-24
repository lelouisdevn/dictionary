<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Database\Capsule\Manager as DB;

Class Search extends Controller {

    // thêm từ được yêu thích vào danh sách.
    // ajax (content.js);
    public function addToWordlist(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])){
            $data['word'] = $_POST['word'];
            $word = $data['word'];

            $BookmarkID = DB::table('bookmark')
            ->where('Word', $word)
            ->where('UserID', $_SESSION['user'])
            ->first();

            // nếu từ đã được yêu thích, xóa từ đó khỏi danh sách.
            // nếu chưa thì thêm vào danh sách.
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

    // kiểm tra xem từ đang được tra có được like chưa;
    // đoạn ajax nằm trong hàm search (content.js);
    public function wordIsLiked(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])){
            // $data['word'] = $_POST['word'];
            // $word = $data['word']; ????
            $word = $_POST['word'];

            $BookmarkID = DB::table('bookmark')
            ->where('Word', $word)
            ->where('UserID', $_SESSION['user'])
            ->first();

            // echo json_encode($BookmarkID->BookmarkID);
            // nếu đã được like -> trả ra 1.
            if ($BookmarkID) {
                echo 1;
            }
        }
    }
}