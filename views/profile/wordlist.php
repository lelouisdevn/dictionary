<?php $this->layout("layouts/profile", ["title" => APPNAME]) ?>

<?php $this->start("page-child"); ?>

<!-- content -->
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
            <i class="fa fa-heart"></i>
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
    // Hiển thị màu ở dòng có số thứ tự chẵn.
    $('.album:even').addClass('alert alert-info');
</script>

<script src="/js/search.js"></script>
<?php $this->stop(); ?>