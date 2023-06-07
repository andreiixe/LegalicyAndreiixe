<?php
require "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (empty($_SESSION["id"])) {
        header("Location: ../login");
        exit();
    }

    // Get the user's name from the database
    $userId = $_SESSION["id"];
    $statement = mysqli_prepare($conn, "SELECT name FROM tb_user WHERE id = ?");
    mysqli_stmt_bind_param($statement, "i", $userId);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];

    // Get the form data
    $message = $_POST["message"];

    // Prepare and execute the SQL statement
    $statement = mysqli_prepare($conn, "INSERT INTO guest_book (name, message, user_id) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "ssi", $name, $message, $userId);
    mysqli_stmt_execute($statement);

    // Check if the entry was successfully added
    if (mysqli_stmt_affected_rows($statement) > 0) {
        echo "Guest book entry added successfully!<br><td colspan='2' width='430' valign='bottom' bgcolor='#FFBEBE'><p>[<a href='guestbook'>Back to GuestBook</a>][<a href='../index'>Home</a>][<a href='../config/srcuser'>MyProfile</a>]";
    } else {
        echo "Failed to add guest book entry.";
    }

    // Close the statement and database connection
    mysqli_stmt_close($statement);
    mysqli_close($conn);
} else {
    // Redirect if accessed directly without form submission
    header("Location: guestbook");
    exit();
}
?>