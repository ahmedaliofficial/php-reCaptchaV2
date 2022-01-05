<?php
class reCaptchaV2{

    private $SecreatKey; //your secreat key equired. The shared key between your site and reCAPTCHA.
    private $Response; //$_POST['g-recaptcha-response'] POST parameter when the user submits the form on your site
    private $UserIp; //The user's IP address.
    private $Validate = false;
    private $ResponseKey;

    public function Render($ResponseKey)
    {
        $this->ResponseKey = $ResponseKey;

        echo '<div class="g-recaptcha" data-sitekey="'.$this->ResponseKey.'"></div>';
    }

    public function Validate($Response,$SecreatKey):bool
    {
     
        $this->Response = $Response;
        $this->SecreatKey = $SecreatKey;
        $this->UserIp = $_SERVER['REMOTE_ADDR'];
        
        $GetResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$this->SecreatKey&response=$this->Response&remoteip=$this->UserIp");
        
        $GetResponse = json_decode($GetResponse);

        if($GetResponse->success==true){
            $this->Validate = true;
        }
       
        return $this->Validate;
    }


}
$reCaptchaV2 = new reCaptchaV2();

// $reCaptchaV2->Validate($_POST['g-recaptcha-response'],SecreatKey);

// true measn captcha verfied
//false means not verfied
