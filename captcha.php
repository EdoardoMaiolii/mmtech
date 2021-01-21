<?php
require_once 'bootstrap.php';
//creazione dell'immagine e aggiunta di un background di colore grigio
$image = imagecreatetruecolor(120, 30);
$background = imagecolorallocate($image, 200, 200, 200);
imagefill($image, 0, 0, $background);
$linesColor = imagecolorallocate($image, 100, 100, 100);
for ($i = 1; $i <= 5; $i++) {
    imagesetthickness($image, rand(1, 2));
    imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linesColor);
}
$captcha = '';
$textColor = imagecolorallocate($image, 0, 0, 0);
for ($x = 15; $x <= 95; $x += 20) {
    $value = rand(0, 9);
    imagechar($image, rand(3, 5), $x, rand(2, 14), $value, $textColor);
    $captcha .= $value;
}
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
setCaptcha($captcha);

/* 
                    <div id="minirow" class="form-group">
                    <label id="info" class="col-form-label" for="captcha">Captcha: </label>
                        <p id="ppar"><img id="captchaImg" src="captcha.php" /> <a href="javascript:refreshCaptcha()"> <img src="<?php echo MOCKUP_DIR."refresh.png"; ?>"/> </a>  </p>
                        <input class="form-control" type="text" id="captcha" name="captcha" maxlength="5" required/>
                    </div>

                    function setCaptcha($value){
    $_SESSION['captcha'] = $value;
}
if (!empty($_POST['captcha']) && $_POST['captcha']==$_SESSION['captcha']){

*/
