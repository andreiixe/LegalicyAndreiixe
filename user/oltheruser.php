<?php
require "../config/config.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM tb_user WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    // Display the user's information here
}
?>

<html>
    <head>
        <title>Legalicy Andreiixe | <?php echo $row["username"]; ?></title>
        <link rel="stylesheet" href="usr.css">
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
                        <a href="../home/about">
                            <img src="../src/images/bar/about.gif" width="138" height="36" alt="About" border="0">
                        </a>
                        <br>
                        <a href="../home/blog">
                            <img src="../src/images/bar/Blog.gif" width="138" height="36" alt="Blog" border="0">
                        </a>
                        <br>
                        <a href="../home/link">
                            <img src="../src/images/bar/Links.gif" width="138" height="36" alt="Links" border="0">
                        </a>
                        <Br>
                        <br>
                        <?php if ($row && $row['role'] == 'admin') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='../dashboard/admin'>Dashboard Admin</a></center>";
                        } ?> 
                        <!--/Navbar bar I-->
                        <br>
                        <br>
                        <!--user broo-->
                        <!--Space BRRRRRRRRRRRRRRRRRRRRRRRRRRRR-->
                        <br>
                        <br>
                        <br>
                        <p>
                            <!--NavBar Bar II-->
                            <font face="geneva, arial" size="-1">
                                <a href="https://andreiixe.github.io/">Github Website</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="http://filesandreiixe.infinityfreeapp.com/">Andreiixe Files</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="../home/feedback">Feedback</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="../home/linkus">Link to Us</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="../src/txt/Builds.txt">Updates</a>
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
                        <!--/Host Link-->
                        <p>
                            <!--Copyright, Because is cool to have this-->
                            <font face="geneva, arial" size="-2">
                                By Pika Dev.<br>
                                All rights rezerved.
                            </font>
                            <!--/Copyright-->
                        </p>
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
                        <!--MainAbout me-->
                        <table border="0" cellspacing="0" cellpadding="0" width="415">
                            <tbody>
                                <div class="myaccount">
                                    <p class="mytext"> <?php echo $row["username"]; ?>'s account </p>
                                </div>
                                <div class="left">
                                <img src="../pfp/<?php echo $row['image'];?>" onerror="this.onerror=null; this.src='otherpfp.jpg'" style="" class="pfp">
                                <br>
                                <tr>
                                    <div class="info">
                                        <p class="accinfo">
                                            Account Info:
                                        </p>
                                        <p class="reg">
                                            <gi>ID: </gi><?php echo $row["id"]; ?>
                                            <br>
                                            <gi>Name: </gi><?php echo $row["name"]; ?>
                                            <br>
                                            <gi>Email: </gi><?php echo $row["email"]; ?>
                                        </p>
                                    </div>
                                    <div class="status">
                                        <p class="fhe">Biography</p>
                                        <img src="../src/images/logos/bio.png" class="statuspic">
                                        <p class="bio"><?php echo $row["biography"]; ?></p>
                                        <tr valign="top">
                                   <td>
                                </tr>
                                </div>
                                <br>
                                <br>
                                <br>
                                <td colspan="2" width="430" valign="bottom" bgcolor="#ead8d8">
                                <!--:)))))))) spatiuuuuuu bossssss-->
                            </td>
                            </tbody>
                        </table>
                        <p><br>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>