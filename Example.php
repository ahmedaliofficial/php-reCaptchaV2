<?php 

require_once('./CwaPlugs/recaptchav2.php');

if(isset($_POST['formsub'])){
    
    if($_POST['g-recaptcha-response']){
        $Response = $_POST['g-recaptcha-response'];
        $SecreatKey = "6LduwdIUAAAAAPmZYryJzkDQ2yK0sZKtq72U9zfP";
        $validate = $reCaptchaV2->Validate($Response,$SecreatKey);
        if($validate===true){
            echo "Validation Success";

                // Your Backend Code
        }
        else{
            echo "Please Fill reCaptchaV2.";
        }
    }
    else{
        echo "Please Fill reCaptchaV2.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Recaptcha</title>

    <!-- reCaptchav2 Script Required -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>  


</head>
<body>
    
    <form action="" method="post">
        <input type="name">
        <input type="email">
        <?php 
        //   $reCaptchaV2->Render(ResponseKey);
        $reCaptchaV2->Render("6LduwdIUAAAAABCx5x1pkGwWkJwowkbjGAPApzlS");
        
        ?>
        <button name="formsub">submit</button>
    </form>

</body>
</html>