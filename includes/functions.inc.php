<?php

function emptyInputSignup($username, $mail, $pwd, $pwdRepeat) { //se även signup.inc.php
    $result;
    if (empty($username) || empty($mail) || empty($pwd) || empty($pwdRepeat)) {    // || = OR
        $result = true; //sant att det fanns tomma fält
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) { //se även signup.inc.php
    $result;
    if (!preg_match("/^[a-zA-Z0-9åäöÅÄÖ]*$/", $username)) {    // search algorithm // preg_match standard i php, vi kollar här formatet
        $result = true; // sant att det inte matchade algoritmen
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($mail) { //se även signup.inc.php
    $result;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {    //a built in function in php
        $result = true; // sant att det inte var en giltig e-post
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) { //se även signup.inc.php
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true; // sant att lösenorden inte var identiska
    }
    else {
        $result = false;
    }
    return $result;
}

// följande skiljer sig från övriga
function uidExists($conn, $username, $mail) { //se även signup.inc.php
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;"; // * all, either username OR email !!
    $stmt = mysqli_stmt_init($conn);  //initializing a new prepared statement
    //prepare the prepared stmt with the sql stmt
    //prevent users from injecting code into the form fields
    //run the stmt first without userinput
    if (!mysqli_stmt_prepare($stmt, $sql)) {     //checking for any mistakes
        header("location: ../index.php?error=stmtfailed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $mail);    //ss, two strings
    mysqli_stmt_execute($stmt);     //executing the statement

    $resultData = mysqli_stmt_get_result($stmt);     //get the result from this particular prepared statement

    if ($row = mysqli_fetch_assoc($resultData)) {
        /*checking if there is a result from this statement and assigning the data to $row at the same time
        creating a variable while checking true of false inside the function

        fetching the data as an accosiative array
        assiciative: the column set to their names inside the array
        to see if anything is using $resultData

        if i receive data from the database its going to return as TRUE (if the user already exists)
        if not, it's going to return as false

        The function has a second purpose:

        if there is data in the database with this username, i want to grab the data with the username
        because when we're logging in the user, we're going to be checking for the same thing

        if it's FALSE we get what we want for user registration
        if it's TRUE we get what we want for user login

        */

        return $row;
        /*returning all the data from the database if this user exists inside the database
        we'll use this data to login the user later
        multiple purposes, for signup and login*/
    }

    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt); //closing down the prepared statement
}

function createUser($conn, $username, $mail, $pwd) {
    //columns have to be in the proper order, se databas, ?: placeholders, 4 pieces of data
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); //initialize a new prep stmt
    //check if it's actually possible
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    //hash the password to not make it readable
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //password_hash in php is automatically being updated

    //if it does not fail, bind paremeters to it
    mysqli_stmt_bind_param($stmt, "ssss", $username, $mail, $hashedPwd);   //ssss: 4 pieces of data
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); //closing down the prepared statement
    header("location: ../#show_log");
    exit();
}

function emptyInputLogin($mail, $pwd) { //se även login.inc.php
    $result;
    if (empty($mail) || empty($pwd)) {    // || = OR
        $result = true; //sant att det fanns tomma fält
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $mail, $pwd) {    //se även login.inc.php
    $uidExists = uidExists($conn, $mail, $mail); //ena för username, andra för epost

    //errorhandling
    if ($uidExists === false) {
        header("location: ../index.php?error=invalidLogin");
        exit();
    }

    //check the password with the hashed version inside the database
    $pwdHashed = $uidExists["usersPwd"]; //grab the data from the column usersPwd in the database
    $checkPwd = password_verify($pwd, $pwdHashed); //if these match it returs at true

    if ($checkPwd === false) {
        header("location: ../index.php?error=wrongLogin");
        exit();
    }

    //store data inside a session
    elseif ($checkPwd === true) {
        session_start();
        //create session variables (superglobals)
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["userUid"] = $uidExists["usersUid"];
        header("location: ../index.php");
    }
}