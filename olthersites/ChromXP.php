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
        <title>Legalicy Andreiixe | Chromium on Windows XP</title>
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
                                                <?php if ($row && $row['role'] == 'tester') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='Tester/newstuff'>Dashboard Tester</a></center>";
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
                        <!--copyright-->
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
                        <br>
                        <font size="+2" face="geneva,arial"><b>Chromium newer versions on Windows XP</b>
                        </font>
                        <br>
                        <p>To support windows xp support on Chromium, several points must be resolved:</p>
                        <br>
                        <p>1. Create or modify system API which is not available under xp.<br>
                            2. Change some API call parameters. Otherwise errors may occur under xp.<br>
                            3. Modify part of the process to solve some problems, such as font display and sound playback problems.<br>
                            4. Change some build parameters, mainly to solve the TLS issue.</p>
                        
                        <br>
                        <p>Observation</p>
                        <p>If you are very familiar with Chromium, it can be done in about a month and a half.
                            The technical difficulty is not too great.
                            The most annoying thing is that there are many small holes to debug to find the reason, which is the most painful.
                            Look at the first point first, it's easier to handle.
                            Take the compiled file to look at xp and you will know which APIs are missing.
                        </p>
                        <br>
                        <p>Currently there are three categories:</p>
                        <p>1. Read-write blocks are linked to condition variables.</p>
                        <p>This is the most used API in chrome which is not available under XP. My solution is to create a copycat version of the API myself, the interface and prototype are exactly the same as the original Windows version. For example, AcquireSRWLockExclusive, AcquireSRWLockShared, etc. I'm referring to some ReactOS code (but I want to complain, that code has bugs. After running it, various assertions were wrong). The more annoying part of the process is that it needs to be tested more, because things involving multi-threading can easily hide hidden bugs.</p>
                        <p>Additionally, I want to praise the new windows API design. The read-write lock and the condition variable share a set of mechanisms, calling the kernel's NtkeyWaitxxx series API. Moreover, the data structure is designed as a one-dimensional pointer variable, using bitwise operations to carefully extract the value of each bit, and can be done without events and other deadlocks, which is very simple and efficient. I think other people have to use event mock to achieve this point, which seems relatively cumbersome.</p>
                        <br>
                        <p>2. D2D, D3D.</p>
                        <p>I just cut this part. does not affect. Because d2d can use GDI and D3D can use angle or swiftshader.</p>
                        <p>Let me give Google credit here and I actually bought swiftshader. Swiftshader is a very old rendering software that used to do soft rendering for Windows systems or set-top boxes. Sure enough, Google is rich and powerful. To achieve 3D acceleration on all platforms and all hardware, it does everything. It gives me the feeling that in order to build a car, I first bought an iron mine. That said, chromium uses opengl for rendering, but there are various issues with driver support under Windows, so Google will use angle to pass opengl to D3D. If there is a problem with starting D3D (this is very common, many garbage graphics cards support various hardware acceleration bugs, for this reason Google made a blacklist of graphics cards in chrome and disabled hardware rendering when they were encountered), then go for pure software rendering i.e. swiftshader. Both swiftshader and angle are compiled with the same libGLESv2.dll interface. Use whatever is available, really cool.</p>
                        <br>
                        <p>3. Other miscellaneous APIs.</p>
                        <p>There are many such as GetIfTable2, InitPropVariantFromCLSID, RaiseFailFastException, GetUserDefaultLocaleName, SHGetPropertyStoreForWindow and so on. These are actually easier to handle, you just need to find out what old API was used by the previous version of chromium and then replace it back. There are too many such APIs, so I won't go into details. Replacing all APIs is just the first step in the Moon March. The next step is to fix errors in various processes.</p>
                        <br>
                        <p>Choose a few points below.</p>
                        <p>First is font rendering. Hell Google is killing all the old GDI renderings and using DWrite rendering instead. What's even worse is that even if you kill it, you can delete all the code. In fact, it is entirely possible to judge which branch has the next version. Because as far as I know, dw may still have a small bug in some win7. But Google doesn't care at all. It is estimated that these legacy systems should not be supported. So to solve this problem we need to find the year patch and then add the gdi rendering.<br><br>

                            Then the sound cannot be played. This is also caused by killing the old wavexxxx series api. Just add it back.
                            Then don't forget to add /Z c:threadSafeInit- in src\build\config\win\BUILD.gn (I'm probably wrong about variables here)
                            The reason is that XP's dynamic tls implementation is not perfect. vs's dynamic tls mechanism must be completely disabled. But this will bring a problem, that is, there may be multi-threaded contention issues in some places. This requires changes one by one. There are many places so I won't talk about it.<br><br>
                            
                            Another thing is if you want to support xp sp2 you will run into a big problem ie vs's xp toolkit and the compiled runtime depends on an API that xp sp2 doesn't have. This has been bothering me for a few days. Finally I thought of a very simple way, which is to compile all the dlls in md mode, then make concrt14.dll an IAT HOOK and redirect kernel32.dll to a redirect dll that -I wrote. Just implement the API internally. This method can also be used to support sp1. But sp1 is used by too few people. I guess there might not be a thousand people across the country so I won't bother with sp1.<br><br>
                            
                            In addition, there is a big problem is the sandbox (ie sandbox). In fact, if you don't have high security requirements, you can turn off the sandbox entirely. But I'm aiming more for perfection (it's actually a task requirement, clam), and I finally got the sandbox running. Many places in the sandbox are connected according to the system. Some hooks need to be removed under xp.<br><br>
                            
                            Finally, there are still some small issues to fix, such as removing the ssl error check from net\cert\http://cert_verify_proc_win.cc to prevent the https website from loading, http://file_enumerator_win.cc must to change the calling parameters, etc. You will know these after debugging, it is relatively simple.<br><br>
                            
                            The whole process is basically like this. Of course, there are many, many details that need to be explained in code terms, so I'm too lazy to expand here.<br><br>
                            
                            In short, this kind of work is hard work (especially compiling and debugging chrome, which is called slow, and in the end I couldn't stand it and directly spent thousands of dollars to add memory and SSD). But for the sake of the money, I put up with it... I think I'm done here, I'm going back to my sleep.</p>
                            <table width="525" border="0" cellpadding="4" cellspacing="2">
                            <tbody><tr>
                                <td colspan="2">
                                <hr size="1">
                                </td>
                            </tr>
                            </tbody></table>
                        </p> 
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>