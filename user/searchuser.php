<?php
require "../config/config.php";

if (!empty($_POST["name"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $query = "SELECT * FROM tb_user WHERE name LIKE '%" . $name . "%'";
} else {
    $query = "SELECT * FROM tb_user";
}

$result = mysqli_query($conn, $query);
?>


<html>
    <head>
        <title>Legalicy Andreiixe | Search profile</title>

    </head>
    <body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
        <table border="0" width="690" cellpadding="0" cellspacing="0">
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
                    <td width="625">
                        <!--MainAbout me-->
                        <table border="0" cellspacing="0" cellpadding="0" width="415">
                        <font size="+2" face="geneva,arial"><b>Search
                            <font color="#ff0000">Users</font> (Beta 3)</b>
                        </font>
                        <br>
                        <form method="POST" action="">
                        <input type="text" name="name" class="sear" placeholder="Search by username..."></div>
                        <button class="buttlog" type="submit">Search</button>
                        </form>
                        
                        <br>
                        <br>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <div class="profile">
                                <img src="../pfp/<?php echo $row['image'];?>" width="75" height="75" style="object-fit: cover; margin-right: 10px;" align="center" border="0">
                                <h3 style="margin: 0;"><a href="oltheruser?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></h3>
                                <div style="clear:both;"></div>
                            </div>
                        <?php } ?>

                        <style>
                            .profile {
                                display: inline-block;
                                border: 1px solid #e04e43;
                                padding: 12px;
                                margin-bottom: 10px;
                                margin-left: 10px;
                                width: calc(33.33% - 77px);
                                text-align: center;
                            }
                            .profile h3 {
                                margin-top: 0;
                            }
                            .sear {
                                position: relative;
                                width: 200px;
                                left: 100px;
                                top: 3px;
                                font-family: Tahoma,Verdana,Segoe,sans-serif;
                                font-size: 11px;
                                border: 1px solid #d8bdbd;
                                height: 16px;
                            }
                            .buttlog {
                                top: 3px;
                                left: 104px;
                                border-style: solid;
                                border-top-width: 1px;
                                border-left-width: 1px;
                                border-bottom-width: 1px;
                                border-right-width: 1px;
                                border-top-color: #ead9d9;
                                border-left-color: #ead9d9;
                                border-bottom-color: #5b0e0e;
                                border-right-color: #5b0e0e;
                                background-color: #983b3b;
                                color: #FFFFFF;
                                font-size: 11px;
                                font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
                                position: relative;
                            }
                        </style>

                        </table>
                        <p><br>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
