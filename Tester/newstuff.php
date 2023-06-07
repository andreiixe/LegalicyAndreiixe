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

    // Check if the user has the "tester" role
    if ($row && isset($row['role']) && $row['role'] == 'tester') {
        // Log the login activity with the current page URL
        $logMessage = 'User with ID ' . $id . ' logged in at ' . date('Y-m-d H:i:s') . ' from page: ' . $currentURL . "\n";
        $logFilePath = '../dashboard/Login.log'; // Set the path to your log file
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);

        // Display the rest of your page content here
        // ...
    } else {
        echo 'You are not authorized to access this page.';
    }
} else {
    header("Location: login.php");
    exit();
}
?>


<html>
    <head>
        <title>Legalicy Andreiixe | Dashboard Tester</title>
    </head>
    <body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
        <table border="0" width="590" cellpadding="0" cellspacing="0">
            <tbody>
                <tr valign="top">
                    <!--Prima coloana-->
                    <!--NavBar-->
                    <td width="140">
                    <a href="../index">
                        <img src="../src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0">
                        </a>
                        <br>
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
                                        <?php echo $row["role"]; ?>
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
                                By Andreiixe Dev.<br>
                                All rights rezerved.
                            </font>
                        </p>
                        <!--copyright-->
                    </td>
                    <td width="4" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="4" height="1">
                    </td>
                    <td bgcolor="#666666" width="1" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="1" height="1">
                    </td>
                    <td width="5" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="5" height="1">
                    </td>
                    <!--/navbar-->
                    <td width="425" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0" width="415">
                            <tbody>
                                <tr>
                                    <td valign="bottom" align="left" width="315">
                                        <font face="geneva,arial" size="+1">
                                            <b>Dashboard Tester</b>
                                        </font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellspacing="0" cellpadding="3" width="415">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <font face="geneva, arial">
                                        Ahh.. features not yet active on the website? Look, you're a tester. To test any feature before anyone ;)). Below you have the links to the new things.
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="96" align="left" valign="bottom">&nbsp;</td>
                                    <td width="319" align="left" valign="top">
                                        <font face="geneva,arial" size="-1">
                                            <font color="#FF0000">
                                                <b>&gt;</b>
                                                <a href="../indexalpha.php">New Index (pre-alpha)</a><br>
                                            </font>
                                            <br>
                                            <br>
                                        </font>
                                        <p><br>
                                            <table width="525" border="0" cellpadding="4" cellspacing="2">
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
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>