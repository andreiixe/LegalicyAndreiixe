<?php
require "config/config.php";

if (!empty($_SESSION['id'])) {
    header("Location: index");
    exit();
}

if (isset($_POST["submit"])) {
    $usernameemail = mysqli_real_escape_string($conn, $_POST["usernameemail"]);
    $password = $_POST["password"];

    $query = "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["Login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index");
        } else {
            echo "<script>alert('You have entered a wrong password. If you forgot your password, send an email: supportlegalyandreiixe@proton.me.');</script>";
        }
    } else {
        echo "<script>alert('Username or e-mail are invalid, please register. Or if you forgot, contact us at supportlegalyandreiixe@proton.me');</script>";
    }
}
?>

<html>
    <head>
        <title>Legalicy Andreiixe | Login</title>
    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" width="415">
            <tr>
                <td width="96"><img src="src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0"></td>
                <td valign="bottom" align="left" width="319"><font face="geneva,arial" size="+1"><b>. . . Shh, let's <font color="#6D84B4" size="+1">
                <b>
                    Login
                </b>
                </font> :)
        </table>
        <table border="0" cellspacing="0" cellpadding="5" width="415" bgcolor="#c5d7fc">
            <tr>
                <td width="140"></td>
                <td width="275"></td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#6D84B4">
                <p class="welcometext">Welcome to Andreiixe!</p>
                </td>
            </tr>
            <td colspan="2">
                <font face="geneva, arial" size="-1">Do you want to see everything on the website? Now you have to log in to have the newest features.</font>
            </td>
            <form action="" method="post">
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>E-mail or Login Name</b></font>
                    </td>
                    <td>
	                    <input type='text' name='usernameemail' id='usernameemail' required>
	                </td>
                <tr>
                <tr valign="middle">
	                <td align="right">
	                    <font face="geneva, arial" size="-1"><b>Password</b></font>
	                </td>
	                <td>
                    <input type="password" id="password" name="password" required>
	                </td>
                </tr>
                </tr>
                <tr valign="middle">
	                <td>&nbsp;</td>
	                <td>
                        <input type="submit" name="submit" class="buttlog" value="Login"></form>   
	                </td>
                </tr>    
   
        </table>
        <style>
            .welcometext {
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                color: white;
    position: relative;
    margin-top: 5px;
    text-align: left;
    margin-left: 10px;
    font-size: 14px;
    font-weight: bolder;
            }
            .buttlog {
                border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    background-color: #3b5998;
    color: #FFFFFF;
    font-size: 11px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    left: 9px;
            }
        .buttreg {
            border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    background-color: #3b5998;
    color: #FFFFFF;
    font-size: 11px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    left: 9px;
        }
        </style>
        <tr>
	        <td>&nbsp;</td>
	            <td rowspan="5">&nbsp;&nbsp;</td>
	                <td>&nbsp;</td>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <font face="geneva, arial" size="-2">
                            By PikaDev.
                            All rights rezerved.
                        </font> 
                    </tr>
                </tr>
    </body>
</html>