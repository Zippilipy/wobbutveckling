<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>hemsida</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <script type="text/javascript" src="js/script.js" defer></script>
</head>
<body>

<div class="wrapper">

    <nav class="nav">
        <div class="topdiv">
            <!--<a href="#" class="homebutton"><img class="logoimg" src="assets/oie_0XS8ZpJxNDWx75.png"></a>-->
            <a class="homebutton" href="#"><h2 class="logotext1">Framtiden Inc.</h2><h2 class="logotext2">⋒</h2><h2 class="logotext3">Framtiden är imorgon, sov tills dess.</h2></a>
            <!-- Button to open the modal login form -->
            <div class="logindiv"><button onclick="document.getElementById('id02').style.display='block'" style="width: auto; margin: 1rem;">Register</button><button onclick="document.getElementById('id01').style.display='block'" style="width: auto; margin: 1rem;">Login</button></div>

            <!-- The Modal -->
            <div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'"
        class="close" title="Close Modal">&times;</span>

                <!-- Modal Content -->
                <form class="modal-content animate" method="post" action="/action_page.php">

                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label for="mail"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="mail" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="confpsw"><b>Confirm password</b></label>
                        <input type="password" placeholder="Enter Password" name="confpsw" required>

                        <button type="submit">Register</button>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

            <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

                <!-- Modal Content -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="imgcontainer">
                        <img src="img_avatar2.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="loginname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="loginname" required>

                        <label for="loginpsw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="loginpsw" required>

                        <button type="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="navdiv">
            <a href="">
                <div><p>1</p></div>
            </a>
            <a href="">
                <div><p>2</p></div>
            </a>
            <a href="">
                <div><p>3</p></div>
            </a>
            <a href="">
                <div><p>4</p></div>
            </a>
        </div>
    </nav>
    <div class="sidebar" id="sideBar" style="height: 0; display: none;"></div>
</div>