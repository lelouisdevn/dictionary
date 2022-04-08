<?php
    require '../vendor/autoload.php';

    use Gregwar\Captcha\CaptchaBuilder;
    use Gregwar\Captcha\PhraseBuilder;

    session_start();

    $builder = new CaptchaBuilder;
    $builder->build();
    
    if ($_SERVER['REQUEST_METHOD']  == 'POST'){
        $user_input = $_POST['captcha'];
        echo $_SESSION['phrase'];
        echo "<br>";
        echo $user_input;

        // if ($user_input == $_SESSION['phrase']){
        if(PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['captcha'])){
            echo "<pre>okay</pre>";
        }else {
            echo "<pre>no</pre>";
        }
    }

    $_SESSION['phrase'] =  $builder->getPhrase();
    echo $_SESSION['phrase'];

?>

<h2>Log in</h2>
<form method="post">
    <div>
        <label for="">Username:</label>
        <input type="text" name="username">
    </div>

    <div>
        <label for="">Password:</label>
        <input type="password" name="password">
    </div>

    <div>
        <img src="<?php echo $builder->inline(); ?>" alt="Captcha">
        <br>
        <input type="text" name="captcha">
    </div>

    <div>
        <button type="submit">Log in</button>
    </div>
</form>