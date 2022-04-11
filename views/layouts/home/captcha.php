<?php
    require '../vendor/autoload.php';

    use Gregwar\Captcha\CaptchaBuilder;
    use Gregwar\Captcha\PhraseBuilder;

    $builder = new CaptchaBuilder;
    $builder->build();
    
    // if ($_SERVER['REQUEST_METHOD']  == 'POST'){
    //     $user_input = $_POST['captcha'];
    //     // echo $_SESSION['phrase'];
    //     // echo "<br>";
    //     // echo $user_input;

    //     // if ($user_input == $_SESSION['phrase']){
    //     if(PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['captcha'])){
    //         // echo "<pre>okay</pre>";
    //     }else {
    //         // echo "<pre>no</pre>";
    //     }
    // }

    $_SESSION['phrase'] =  $builder->getPhrase();
    // echo $_SESSION['phrase'];