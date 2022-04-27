<?php $this->layout("layouts/profile", ["title" => APPNAME]) ?>

<?php $this->start("page-child"); ?>

<!-- content -->
<!-- hiển thị từ, nút like, thời gian thêm vào ds -->
<table style="width: 100%;">
    <tr class="album" style="font-size: 18px; font-weight: bold;">
        <td style="width: 70%;">Word</td>
        <td style="width: 5%;">
            <i class="fa fa-heart"></i>
        </td>
        <td style="width: 25%;">Added at</td>
    </tr>
    <?php foreach ($wordlist as $key => $value) { ?>
    <tr class="album">
        <td>
            <a href="/search?keyword=<?=$value->Word?>"><?=ucfirst($value->Word)?></a>
        </td>
        <td>
            <i class="fa fa-heart heart"></i>
            <input type="text" name="BookmarkID" style="display: none;" value="<?=$value->BookmarkID?>">
        </td>
        <td><?php echo $value->created_at; ?></td>
    </tr>
    <?php } ?>
</table>
<!-- end content -->

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">

<style>
    tr td{
        padding: 10px;
    }

    tr td:last-child {
        text-align: right;
    }
    td a {
        color: black;
    }
</style>

<script>
    // Hiển thị màu (xám) ở dòng có số thứ tự chẵn.
    $('.album:even').addClass('alert alert-info');

    // loại bỏ các từ đã like trong wordlist
    // khi thành viên click vào nút like.
    $('.heart').on('click', function(e){
        // console.log(e.target.nextElementSibling);
        var BookmarkID = e.target.nextElementSibling.value;
        console.log(BookmarkID)

        var album = e.target.parentElement.parentElement;
        console.log(album);
        $.ajax({
            type: 'POST',
            url: '/rmLike',
            data: { BookmarkID:BookmarkID },
            success:function(data){
                // đặt lại màu cho các dòng.
               $(album).remove();
               $('.album').removeClass('alert alert-info');
               $('.album:even').addClass('alert alert-info');
            }
        })
    })
</script>

<?php $this->stop(); ?>