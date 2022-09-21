<?php

if (isset($_POST["submit"])) {      // om formuläret skickas genom submit knappen

    $username = $_POST["uname"];
    $mail = $_POST["mail"];       // collecting the data from the input with name email
    $pwd = $_POST["psw"];
    $pwdRepeat = $_POST["confpsw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //ERRORHANDLING

    if (emptyInputSignup($username, $mail, $pwd, $pwdRepeat) !== false) {     //if not (!) equal (==) to false, inte samma som == true!!
        //emptyInputSignup är en funktion som finns i funtions.inc.php
        header("location: ../index.php?error=emptyInput");  //skickar användaren tillbaka till index.php med error meddelande
        exit(); //avslutar scriptet
    }

    if (invalidUid($username) !== false) {
        header("location: ../index.php?error=invalidUid");
        exit();
    }

    if (invalidEmail($mail) !== false) {
        header("location: ../index.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=pwdMismatch");
        exit();
    }

    if (uidExists($conn, $username, $mail) !== false) {    //$conn i dbh.inc.php
        header("location: ../index.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $username, $mail, $pwd); //om allt frid och fröjd; skapa användaren

}

else {
    header("location: ../#show_reg"); //if the user doesn't go the proper way, send back to register
    exit();
}