<?php $this->layout("layouts/profile", ["title" => APPNAME]) ?>

<?php $this->start("page-child"); ?>

<!-- content -->
<table style="width: 100%;">
    <tr>
        <td style="width: 20%;">Word</td>
        <td style="width: 10%;">
            <i class="fa fa-heart"></i>
        </td>
        <td style="width: 20%;">Added at</td>
    </tr>
    <tr class="album">
        <td>
            <a href="/search?keyword=<?php echo "hello" ?>">Hello</a>
        </td>
        <td>
            <i class="fa fa-heart"></i>
        </td>
        <td>11/04/2022</td>
    </tr>
    <tr class="album">
        <td>
            <a target="_blank" href="/search?keyword=<?php echo "goodbye" ?>">Goodbye</a>
        </td>
        <td>
            <i class="fa fa-heart"></i>
        </td>
        <td>11/04/2022</td>
    </tr>
</table>
<!-- end content -->

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">


<script>
    $('.album:odd').css('background-color', 'lightgrey');
</script>
<?php $this->stop(); ?>