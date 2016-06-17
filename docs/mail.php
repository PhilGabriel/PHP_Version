<?php

if(isset($_POST["name"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comments = $_POST["message"];

    $msg = "
    Name: $name
    Email: $email
    Comments:
    $comments";

    $to = "gabriel.philipp@web.de";
    $subject = "Studium-Testmail";
    $headers = "From: <$email>";

    mail($to,$subject,$msg,$headers);
}else{

}
?>