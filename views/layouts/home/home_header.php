<div class="row header">
    <div class="col-3" id="trademark" style="font-size: 30px; font-family: monospace; cursor: pointer;">
        <a style="color: black;text-decoration: none;" href="/">Atlanteans</a>
    </div>
    <div class="col-9">
        <div class="row">
        <div class="col-6"></div>
        <div class="col-6 topbar">
            <?php if(isset($_SESSION['user'])){ ?>
                <p id="logout">Log out</p>
                <p><a style="color: black; text-decoration: none;" href="/profile">Profile</a></p>
            <?php }else { ?>
                <p data-toggle="modal" data-target="#myModal">Sign in</p>
                <p data-toggle="modal" data-target="#signUpModal">Sign up</p>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('#logout').on('click', function(){
        window.location.href = "/user/logout";
    })
</script>