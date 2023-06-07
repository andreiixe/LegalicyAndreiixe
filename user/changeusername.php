<?php
require "../config/config.php";

// Check if the user is logged in
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // Handle form submission
    if(isset($_POST["username"])) {
        $newUsername = $_POST["username"];
        mysqli_query($conn, "UPDATE tb_user SET username = '$newUsername' WHERE id = $id");
        header("Location: ../config/srcuser");
    }
}
else {
    header("Location: ../login");
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
                        <a href="../home/about">
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
                        <img src="src/images/punctsalv.gif" width="4" height="1">
                    </td>
                    <td bgcolor="#666666" width="1" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="1" height="1">
                    </td>
                    <td width="5" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="5" height="1">
                    </td>
                    <!--/navbar-->
                    <td width="425">
                        <!--MainAbout me-->
                        <table border="0" cellspacing="0" cellpadding="0" width="415">
                            <tbody>
                                <div class="myaccount">
                                    <p class="mytext"> My Account </p>
                                </div>
                                <div class="left">
                                <br>
                                <tr>
                                    <div class="info">
                                        <p class="accinfo">
                                            Change username:
                                        </p>
                                        <form method="post" enctype="multipart/form-data">
                                        <input type="text" id="username" name="username" value="<?php echo $row["username"]; ?>">
                                        <input type="submit" value="Save">
                                        </form>
                                    </div>
                                    <td colspan="2" width="430" valign="bottom" bgcolor="#ead8d8">
                                <!--:)))))))) spatiuuuuuu bossssss-->
                                <p>
                                    <center>
                                    [<a href="../config/srcuser">Profile</a>]
                                    [<a href="updateavatar">Edit Avatar</a>]
                                    [<a href="Biographyupd">Edit Biography</a>]
                                    </center>
                                </p>
                            </td>
                                <br>
                                <br>
                                <br>
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