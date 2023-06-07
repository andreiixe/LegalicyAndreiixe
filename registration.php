<?php
require 'config/config.php';

if (!empty($_SESSION['id'])) {
    header("Location: index");
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $newImageName = $_POST["image"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    
    $duplicate = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($duplicate, "ss", $username, $email);
    mysqli_stmt_execute($duplicate);
    $result = mysqli_stmt_get_result($duplicate);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('1')</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user (name, username, image, email, password) VALUES (?, ?, ?, ?, ?)";
            $insertStatement = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($insertStatement, "sssss", $name, $username, $newImageName, $email, $password);
            mysqli_stmt_execute($insertStatement);

            mysqli_query($conn, "UPDATE tb_user SET image = 'default-avatar.gif' WHERE image = '';");

            $_SESSION['id'] = mysqli_insert_id($conn);
            header("Location: index");
            exit();
        } else {
            echo "<script>alert('The password is not the same in confirm password.')</script>";
        }
    }
}
?>

<html>
<head>
    <title>Legalicy Andreiixe | Login</title>
</head>
<body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
    <table width="445" valign="top">
        <!-- /headline -->
        <table border="0" cellspacing="0" cellpadding="0" width="415">
            <tr>
                <td width="96"><img src="src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0"></td>
                <td valign="bottom" align="left" width="319"><font face="geneva,arial" size="+1"><b>. . . Shh, <font color="#6D84B4" size="+1"><b>it's a new user</b></font> <3</b></font></td>
            </tr>
        </table>
        <title>
        <table border="0" cellspacing="0" cellpadding="5" width="415" bgcolor="#c5d7fc">
            <tr>
                <td width="140"></td>
                <td width="275"></td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#6D84B4">
                    <p class="welcometext">Register to Andreiixe!</p>
                </td>
            </tr>
            <td colspan="2">
                <font face="geneva, arial" size="-1">To avoid problems for email collection, you can add to the email <b>*username*@legalicyandreiixe</b> and the rest you can add as you wish.</font>
            </td>
            <form class='' action='' method='post' autocomplete='off'>
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>Name</b></font>
                    </td>
                    <td>
                        <input type='text' name='name' id='name' required value=""><br>
                    </td>
                </tr>
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>Login Name</b></font>
                    </td>
                    <td>
                        <input type='text' name='username' id='username' required value="">
                    </td>
                </tr>
                <input type="hidden" name="image" value="default-avatar.gif">
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>Email</b></font>
                    </td>
                    <td>
                        <input type='text' name='email' id='email' placeholder="name@legalicyandreiixe" required value="">
                    </td>
                </tr>
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>Password</b></font>
                    </td>
                    <td>
                        <input type='password' name='password' id='password' required value="">
                    </td>
                </tr>
                <tr valign="middle">
                    <td align="right">
                        <font face="geneva, arial" size="-1"><b>Confirm Password</b></font>
                    </td>
                    <td>
                        <input type='password' name='confirmpassword' id='confirmpassword' required value="">
                    </td>
                </tr>
                <tr valign="middle">
                    <td>&nbsp;</td>
                    <td>
                        <button class="buttreg" type='submit' name='submit'>Register Now!</button>
                        <br>
                        <br>
                    </td>
                </tr>
            </form>
        </table>
        <tr>
            <td>&nbsp;</td>
            <td rowspan="5">&nbsp;&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="5" width="415">
        <tr>
            <td><font face="geneva, arial" size="-1">* Please do not add a real name or a password that you use on other social network sites because this site is not safe!</font><p><font face="geneva, arial" size="-1"></font></p></td>
            <td><font face="geneva, arial" style="color:red;" size="-1">* Registration on Windows 3.11 with Internet Explorer 5 is not supported for security reasons!</font><p><font face="geneva, arial" size="-1"></font></p></td>
        </tr>
    </table>
    <table width="418" border="0" cellpadding="4" cellspacing="2">
        <tr>
            <td colspan="2">
                <hr size="1">
            </td>
        </tr>
        <tr>
            <td width="350" rowspan="3">&nbsp;
                <font face="geneva, arial" size="-2">
                    By PikaDev.
                    All rights reserved.
                </font>
            </td>

            <td valign="bottom" bgcolor="#cccccc" align="center">

                <font face="geneva, arial" size="-1">
                    <a href="login.php">Login</a>
                </font>
            </td>
        </tr>
    </table>
</body>
</html>
