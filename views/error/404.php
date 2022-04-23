<?php $this->layout("layouts/default/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
    <div class="row content">
        <div class="content-body">
            <div class="col-md-12">
                <div class="mword">
                    <span style="font-size: 50px;">Page not found</span>
                    <span style="color: red; font-size: 30px;">Error 404</span>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div>
                    <span>Sorry, an error has occured. The page you requested could not be found.</span>
                </div>
                <div style="margin: 10px 0;">
                    <a href="/" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Back to home</a>
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">

<?php $this->stop() ?>