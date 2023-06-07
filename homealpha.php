<?php
require "config/config.php";

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

    // Check if the user has the "tester" or "admin" role
    if ($row && isset($row['role']) && ($row['role'] == 'tester' || $row['role'] == 'admin')) {
        // Log the login activity with the current page URL
        $logMessage = 'User with ID ' . $id . ' logged in at ' . date('Y-m-d H:i:s') . ' from page: ' . $currentURL . "\n";
        $logFilePath = 'dashboard/Login.log'; // Set the path to your log file
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
<!--Starting up Website Legalicy Andreiixe-->
<html>
    <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hi <?php echo $row["name"];?>, welcome to legalicy</title>
    </head>
    <body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
        <!--NavBar Left-->
        <table border="0" width="590" cellpadding="0" cellspacing="0">
            <tbody>
                <tr valign="top">
                    <!--Navbar bar I-->
                    <td width="140">
                    <a href="index">
                        <img src="src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0">
                        </a>
                        <br>
                        <a href="home/blog">
                            <img src="src/images/baralpha/myblog.gif" width="138" height="36" alt="About" border="0">
                        </a>
                        <br>
                        <a href="home/link">
                            <img src="src/images/baralpha/links.gif" width="138" height="36" alt="Blog" border="0">
                        </a>
                        <br>
                        <a href="user/searchuser">
                            <img src="src/images/baralpha/searchuser.gif" width="138" height="36" alt="Links" border="0">
                        </a>
                        <br>
                        <a href="guestbo/guestbook">
                            <img src="src/images/baralpha/guestbook.gif" width="138" height="36" alt="Links" border="0">
                        </a>
                        <Br>
                        <br>
                        <?php if ($row && $row['role'] == 'admin') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='dashboard/admin'>Dashboard Admin</a></center>";
                        } ?> 
                        <?php if ($row && $row['role'] == 'tester') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='Tester/newstuff'>Dashboard Tester</a></center>";
                        } ?> 
                        <!--/Navbar bar I-->
                        <br>
                        <br>
                        <!--user broo-->
                        <center>
                            <table border="0" width="88%" cellpadding="3" cellspacing="0">
                                <tbody><tr>
                                    <td bgcolor="#c5d7fc" align="center" style="border-radius:10px;">
                                    <hr size="0.5" width="60">
                                    <a href="config/srcuser">
                                        <img src="pfp/<?php echo $row['image'];?>" width = "70"><br>
                                    </a>
                                        <hr size="0.5" width="60">
                                        <font face="geneva, arial" size="+1" color="#6D84B4"><b><?php echo $row["name"]; ?></b></font>
                                        <hr size="0.5" width="60">
                                        <a href="config/signout">Sign Out</a></font>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </center>
                        <!--Space BRRRRRRRRRRRRRRRRRRRRRRRRRRRR-->
                        <br>
                        <p>
                            <!--NavBar Bar II-->
                            <font face="geneva, arial" size="-1">
                                <a href="homealpha/termsandconditions">Terms and conditions</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="src/txt/Builds.txt">Updates</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                            </font>
                            <!--/NavBar Bar II-->
                        </p>
                        <!--Host Link-->
                        <font face="geneva, arial" size="-2">
                            <br>
                            <br>
                            Host provided by
                            <a href="http://www.awardspace.com/">AwardSpace</a>
                        </font>

                        <p>
                        <font face="geneva, arial" size="-2">
                                By Pika Dev.<br>
                                All rights rezerved.
                            </font>
                            <!--/Copyright-->
                        </p>
                    </td>
                    <!--Bar-->
                    <td width="4" valign="bottom">
                        <img src="src/images/img/punctsalv.gif" width="4" height="1">
                    </td>
                    <td bgcolor="#666666" width="1" valign="bottom">
                        <img src="src/images/img/punctsalv.gif" width="1" height="1">
                    </td>
                    <td width="5" valign="bottom">
                        <img src="src/images/img/punctsalv.gif" width="5" height="1">
                    </td>
                    <!--/Bar-->
                    <!--Main Stuff-->
                    <td width="440">
                        <table width="240" border="0" cellpadding="0" cellspacing="3">
                            <tbody>
                                <tr valign="top">
                                    <!--Title Website-->
                                    <td colspan="2" width="330" valign="bottom" align="center" bgcolor="#c5d7fc" style="border-radius:10px;">
                                        <tt>
                                            <font color="#6D84B4" size="+3">
                                                <b>
                                                Today
                                                </b>
                                            </font>
                                        </tt>
                                        <!--/Title Website-->
                                    </td>
                                    <td rowspan="9" width="2" valign="bottom">
                                        <img src="src/images/img/punctsalv.gif" width="2" height="1">
                                    </td>
                                    <td rowspan="9" bgcolor="#666666" width="1" valign="bottom">
                                        <img src="src/images/img/punctsalv.gif" width="1" height="1">
                                    </td>
                                    <td rowspan="9" width="2" valign="bottom">
                                        <img src="src/images/img/punctsalv.gif" width="2" height="1">
                                    </td>
                                    <!--Update date-->
                                    <tr>
                                        <td colspan="2">
                                            <font face="geneva, arial" size="-1">
                                             <?php echo "Date: " . date("l m Y") . "<br>";?>
                                            </font>
                                            <img src="src/images/img/punctgri.gif" width="300" height="1" vspace="3">
                                        </td>
                                    </tr>
                                    <!--/Update date-->
                                    <!--Today Stuff-->
                                    <tr>
                                        <td colspan="2" valign="top" align="center">
                                            <img src="src/images/ads/LegalicyAd2.gif" width="300" height="40" border="1" vspace="7"><p></p>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <font color="#FF0000">></font>
                                        </td>
                                        <td>
                                            <font size="-1" face="geneva, arial">Don't forget to write a small message on <a href="guestbo/guestbook">GuestBook</a>. I accept any message.</font>&nbsp;&nbsp;<img src="src/images/img/new3.gif">
                                            <font size="+1">&nbsp;</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <font color="#FF0000">></font>
                                        </td>
                                        <td>
                                            <font size="-1" face="geneva, arial">Looking to see your friend? <a href="user/searchuser">Click here</a> to see his profile</font>
                                            <font size="+1">&nbsp;</font>
                                            <img src="src/images/img/punctgri.gif" width="300" height="1" vspace="3">
                                        </td>
                                    </tr>
                                    <!--/Today Stuff-->
                                    <!--Legalicy Ads :)-->

                                    <!--/Legalicy Ads :)-->
                                    <!--Links To Stuff on the website-->
                                    <table width="310" border="0" cellspacing="0" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td colspan="4" bgcolor="#c5d7fc" align="center" style="border-radius:10px;">
                                                    <font face="geneva,arial" size="-1" color="#6D84B4">
                                                        <b>S&nbsp;T&nbsp;U&nbsp;F&nbsp;F</b>
                                                    </font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><font size="+2">&nbsp;</font><font size="-1" color="#0000CC"><b>&gt;</b></font></td>
                                                <td width="50%"><font face="arial, geneva" size="-1">&nbsp;<a href="olthersites/IBMThinkR51e">Supports</a></font></td>
                                                <td><font size="+2">&nbsp;</font><font size="-1" color="#0000CC"><b>&gt;</b></font></td>
                                                <td width="50%"><font face="arial, geneva" size="-1">&nbsp;<a href="olthersites/Develop">Blog Develoment</a></font></td>
                                            </tr>
                                            <tr>
                                                <td><font size="+2">&nbsp;</font><font size="-1" color="#0000CC"><b>&gt;</b></font></td>
                                                <td width="50%"><font face="arial, geneva" size="-1">&nbsp;<a href="home/blog">Blog</a></font></td>
                                                <td><font size="+2">&nbsp;</font><font size="-1" color="#0000CC"><b>&gt;</b></font></td>
                                                <td width="50%"><font face="arial, geneva" size="-1">&nbsp;<a href="https://github.com/andreiixe/LegalicyAndreiixe">Source Code</a></font></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--/Links To Stuff on the website-->
                                    <!--Down Stuff-->
                                    <p>
                                        <table width="310" border="0" cellpadding="3" cellspacing="2">
                                            <tbody>
                                                <!--ads text-->
                                                <tr>
                                                    <td colspan="3" bgcolor="#c5d7fc"><font size="-1" face="geneva, arial"><b>Looking for something where I write shit?</b></font><font size="1"><br>&nbsp;<br></font>
                                                    
                                                    <font face="geneva, arial" size="-1">Of course there is a social web where I can write shit :).<br> I will introduce you to <a href="https://www.theretrobook.net/profile.php?id=805">Theretrobook.net/Andreiixe</a>. <Br>(It doesn't work on Internet Explorer!)
                                                    </font>
                                                    <br>&nbsp;
                                                    </p></td>
                                                </tr>
                                                <!--/ads text-->
                                                <!--legalicy andreiixe pages-->
                                                <tr>
                                                    <td>
                                                        <br>
                                                        <font size="-1" face="geneva, arial">
                                                            <b>Olther Pages Legalicy Andreiixe</b>
                                                        </font>
                                                        <font size="1"><br>&nbsp;<br></font>
                                                        <nobr>
                                                            <a href="home/abouttheproject">About the Project</a>
                                                        </nobr>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <nobr>
                                                            <a href="home/contactme">Contact Andreiixe</a>
                                                        </nobr>
                                                    </td>
                                                </tr>
                                                <!--/legalicy andreiixe pages-->
                                            </tbody>
                                        </table>
                                    </p>
                                    <p>
                                        <br>
                                    </p>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>