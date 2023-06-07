<?php
require "../config/config.php";

// Define the number of entries per page
$entriesPerPage = 10;

// Get the current page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $entriesPerPage;

// Fetch total number of entries
$totalEntriesStatement = mysqli_prepare($conn, "SELECT COUNT(*) as total FROM guest_book");
mysqli_stmt_execute($totalEntriesStatement);
$totalEntriesResult = mysqli_stmt_get_result($totalEntriesStatement);
$totalEntriesRow = mysqli_fetch_assoc($totalEntriesResult);
$totalEntries = $totalEntriesRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalEntries / $entriesPerPage);

// Fetch guest book entries with user names, images, and user IDs using pagination
$statement = mysqli_prepare($conn, "SELECT g.message, u.name, u.image, u.id AS user_id FROM guest_book g JOIN tb_user u ON g.user_id = u.id ORDER BY g.id DESC LIMIT ? OFFSET ?");
mysqli_stmt_bind_param($statement, "ii", $entriesPerPage, $offset);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the statement
mysqli_stmt_close($statement);
mysqli_stmt_close($totalEntriesStatement);
?>

<html>
<head>
    <title>Legalicy Andreiixe | GuestBook</title>
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
                    <br>
                    <br>
                    <center>
                        <table border="0" width="88%" cellpadding="3" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td bgcolor="#FFBEBE" align="center">
                                        <hr size="0.5" width="60">
                                        <?php if (!empty($_SESSION["id"])): ?>
                                            <?php
                                            $userId = $_SESSION["id"];
                                            $statement = mysqli_prepare($conn, "SELECT name, image FROM tb_user WHERE id = ?");
                                            mysqli_stmt_bind_param($statement, "i", $userId);
                                            mysqli_stmt_execute($statement);
                                            $result = mysqli_stmt_get_result($statement);
                                            $row = mysqli_fetch_assoc($result);
                                            $name = $row["name"];
                                            $image = $row["image"];
                                            ?>

                                            <a href="../config/srcuser">
                                                <img src="../pfp/<?php echo $image; ?>" width="100"><br>
                                            </a>
                                            <hr size="0.5" width="60">
                                            <font face="geneva, arial" size="+1" color="#FF0000"><b><?php echo $name; ?></b></font>
                                            <hr size="0.5" width="60">
                                            <a href="../config/signout">Sign Out</a></font>
                                        <?php else: ?>
                                            <!-- Add your desired content for non-logged-in users -->
                                        <?php endif; ?>
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
                            <a href="../home/linkus">Link to Us</a>
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
                    <!--/copyright-->
                </td>
                <td width="4" valign="bottom">
                    <img src="../src/images/punctsalv.gif" width="4" height="1">
                </td>
                <td bgcolor="#666666" width="1" valign="bottom">
                    <img src="../src/images/punctsalv.gif" width="1" height="1">
                </td>
                <td width="5" valign="bottom">
                    <img src="../src/images/punctsalv.gif" width="5" height="1">
                </td>
                <!--/navbar-->
                <td width="425">
                <font size="+2" face="geneva,arial"><b>GuestBook
                            <font color="#ff0000">(Beta)</font></b>
                        </font>
                    <br>
                    <?php if (!empty($entries)): ?>
                        <?php foreach ($entries as $entry): ?>
                            <div>
                                <?php if (!empty($entry["image"])): ?>
                                    <a href="../user/oltheruser?id=<?php echo $entry["user_id"]; ?>">
                                        <img src="../pfp/<?php echo $entry["image"]; ?>" alt="Avatar" width="50" height="50">
                                    </a>
                                <?php else: ?>
                                    <a href="../user/oltheruser?id=<?php echo $entry["user_id"]; ?>">
                                        <img src="default-avatar.png" alt="Default Avatar" width="50" height="50">
                                    </a>
                                <?php endif; ?>
                                <strong>Name:</strong>
                                <a href="../user/oltheruser?id=<?php echo $entry["user_id"]; ?>"><?php echo $entry["name"]; ?></a><br>
                                <strong>Message:</strong> <?php echo $entry["message"]; ?>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No guest book entries found.</p>
                    <?php endif; ?>

                    <!-- Pagination Links -->
                    <?php if ($totalPages > 1): ?>
                        <div>
                            <?php if ($page > 1): ?>
                                <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <?php if ($i == $page): ?>
                                    <span><?php echo $i; ?></span>
                                <?php else: ?>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <a href="?page=<?php echo $page + 1; ?>">Next</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <h2>Add a Guest Book Entry</h2>

                    <?php if (!empty($_SESSION["id"])): ?>
                        <?php
                        $userId = $_SESSION["id"];
                        $statement = mysqli_prepare($conn, "SELECT name, image FROM tb_user WHERE id = ?");
                        mysqli_stmt_bind_param($statement, "i", $userId);
                        mysqli_stmt_execute($statement);
                        $result = mysqli_stmt_get_result($statement);
                        $row = mysqli_fetch_assoc($result);
                        $name = $row["name"];
                        $image = $row["image"];
                        ?>

                        <center><form action="add_guest" method="POST">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?php echo $name; ?>" readonly><br><br>

                            <label for="message">Message:</label><br>
                            <textarea name="message" id="message" required></textarea><br><br>

                            <input type="submit" value="Submit">
                        </form></center>
                    <?php else: ?>
                        <p>Please log in to add a guest book entry.</p>
                    <?php endif; ?>
                    <p><br>
                        <table width="525" border="0" cellpadding="4" cellspacing="2">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <hr size="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
