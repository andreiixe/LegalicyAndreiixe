<?php

require "../config/config.php";

// Get the current page URL
$currentURL = $_SERVER['REQUEST_URI'];

// Check if the user is logged in
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $statement = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE id = ?");
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    // Log the login activity with the current page URL
    $logMessage = 'User with ID ' . $id . ' logged in at ' . date('Y-m-d H:i:s') . ' from page: ' . $currentURL . "\n";
    $logFilePath = '../dashboard/Login.log'; // Set the path to your log file
    file_put_contents($logFilePath, $logMessage, FILE_APPEND);
} else {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title>Legalicy Andreiixe | Contact</title>
    </head>
    <body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
        <table border="0" width="590" cellpadding="0" cellspacing="0">
            <tbody>
                <tr valign="top">
                    <!--Prima coloana-->
                    <!--NavBar-->
                    <td width="140">
                    <a href="index">
                        <img src="../src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0">
                        </a>
                        <br>
                        <a href="about">
                            <img src="../src/images/bar/about.gif" width="138" height="36" alt="About" border="0">
                        </a>
                        
                        <br>
                        <a href="about">
                            <img src="../src/images/bar/Blog.gif" width="138" height="36" alt="Blog" border="0">
                        </a>
                        <br>
                        <a href="link">
                            <img src="../src/images/bar/Links.gif" width="138" height="36" alt="Links" border="0">
                        </a>
                        <Br>
                        <br>
                        <?php if ($row && $row['role'] == 'tester') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='../Tester/newstuff'>Dashboard Tester</a></center>";
                        } ?> 
                        <?php if ($row && $row['role'] == 'admin') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='../dashboard/admin'>Dashboard Admin</a></center>";
                        } ?> 
                        <br>
                        <br>
                        <center>
                            <table border="0" width="88%" cellpadding="3" cellspacing="0">
                                <tbody><tr>
                                    <td bgcolor="#FFBEBE" align="center">
                                    <hr size="0.5" width="60">
                                    <a href="../config/srcuser">
                                        <img src="../pfp/<?php echo $row['image'];?>" width = 100><br>
                                    </a>
                                        <hr size="0.5" width="60">
                                        <font face="geneva, arial" size="+1" color="#FF0000"><b><?php echo $row["name"]; ?></b></font>
                                        <hr size="0.5" width="60">
                                        <a href="../config/signout">Sign Out</a></font>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </center>
                        <br>
                        <br>
                        <!--/Extended opensource-->
                        <!--Olther Andreiixe links-->
                        <p>
                            <font face="geneva, arial" size="-1">
                                <a href="https://andreiixe.github.io/">Github Website</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="http://filesandreiixe.infinityfreeapp.com/">Andreiixe Files</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="feedback">Feedback</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="linkus">Link to Us</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="../src/txt/Builds.txt">Updates</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                            </font>
                        </p>
                        <!--/olther andreiixe links-->
                        <!--Host :))-->
                        <font face="geneva, arial" size="-2">
                            <br>
                            <br>
                            Host provided by
                            <a href="http://www.awardspace.com/">AwardSpace</a>
                        </font>
                        <!--/Host-->
                        <!--Msie-->
                        <!--/msie-->
                        <!--copyright (I added more because it looks cool)-->
                        <p>
                        <font face="geneva, arial" size="-2">
                                By Pika Dev.<br>
                                All rights rezerved.
                            </font>
                        </p>
                        <!--copyright-->
                    </td>
                    <td width="4" valign="bottom">
                        <img src="../src/images/img/punctsalv.gif" width="4" height="1">
                    </td>
                    <td bgcolor="#666666" width="1" valign="bottom">
                        <img src="../src/images/img/punctsalv.gif" width="1" height="1">
                    </td>
                    <td width="5" valign="bottom">
                        <img src="../src/images/img/punctsalv.gif" width="5" height="1">
                    </td>
                    <!--/navbar-->
                    <td width="425">
                        <!--contact me table-->
                        <table cellspacing="0" cellpadding="0" border="0" width="415">
                            <tbody>
                                <tr>
                                    <td>
                                        <font size="+1" face="geneva, arial"><b>Contact Me</b></font>
                                        <hr size="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--modern contact me-->
                        <table cellspacing="0" cellpadding="0" border="0" width="415">
                            <tbody>
                                <tr>
                                    <td>
                                        <font size="-1" face="geneva, arial">
                                            <b>Modern Socials</b>
                                        </font>
                                        <p>
                                            Are you looking for something newer? Here are some links where you can contact me.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <table border="0" cellspacing="0" cellpadding="5" width="415" bgcolor="#ccffff">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <img src="../src/images/logos/Instagram.gif" width="40" height="40">
                                            <br>
                                            <a href="https://www.instagram.com/andreiixe/">Instagram</a>
                                        </td>
                                        <td align="center">
                                            <img src="../src/images/logos/Facebook.gif" width="40" height="40">
                                            <br>
                                            <a href="https://www.facebook.com/andreiixe/">Facebook</a>
                                        </td>
                                        <td align="center">
                                            <img src="../src/images/logos/Teams.gif" width="40" height="40">
                                            <br>
                                            <a href="https://teams.microsoft.com/l/chat/0/0?users=andreiixe825@outlook.com">Teams</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </p>
                        <!--instant messaging contact me-->
                        <table cellspacing="0" cellpadding="0" border="0" width="415">
                            <tbody>
                                <tr>
                                    <td>
                                        <font size="-1" face="geneva, arial">
                                            <b>Instant Messangers</b>
                                        </font>
                                        <p>
                                            Did you lose me in the 2000s? I think you can still find me on instant messengers.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                        <p>
                            <table border="0" cellspacing="0" cellpadding="5" width="415" bgcolor="#ccffff">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <a href="http://escargot.chat/">
                                                <img src="../src/images/logos/msn.gif" width="40" height="40">
                                                <br>
                                                ibmandreiixe@escargot.chat
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="http://iwarg.ddns.net/phoenix/index.php">
                                                <img src="../src/images/logos/Aim.gif" width="40" height="40">
                                                <br>
                                                IBMAndreiixe
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>
                                <table cellspacing="0" cellpadding="0" border="0" width="415">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <font size="-1" face="geneva, arial">
                                                    <b>Old Social Networks</b>&nbsp;&nbsp;&nbsp;
                                                </font>
                                                <p>
                                                    I think I got lost in the 2000s, I should go back to the present, but I don't want to ;)
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <table border="0" cellspacing="0" cellpadding="5" width="415" bgcolor="#ccffff">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <a href="https://www.theretrobook.net/profile.php?id=805">
                                                        <img src="../src/images/logos/faceman.png" width="50" height="40">
                                                        <br>
                                                        theretrobook.net/Andreiixe
                                                    </a>
                                                </td>
                                                <td align="center">
                                                    <a href="http://bitview.net/user/Andreiixe">
                                                        <img src="../src/images/logos/bitview.png" width="70" height="40">
                                                        <br>
                                                        bitview.net/user/Andreiixe
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <br>
                                <table width="425" border="0" cellpadding="4" cellspacing="2">
                                <tbody><tr>
                                    <td colspan="2">
                                    <hr size="1">
                                    </td>
                                </tr>
                                </tbody></table>
                            </p> 
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>