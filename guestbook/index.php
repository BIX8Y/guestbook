<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f4f4f4; }
        .form-box, .messages { margin: 20px 0; padding: 15px; background: #fff; border-radius: 5px; }
        .message { border-bottom: 1px solid #ddd; padding: 10px 0; }
    </style>
</head>
<body>

<h2>Welcome to the Guestbook</h2>

<div class="form-box">
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="4" cols="40" required></textarea><br><br>

        <input type="submit" name="submit" value="Post Message">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    if ($name !== "" && $message !== "") {
        saveMessage($name, $message);
        echo "<p style='color:green;'>Message saved!</p>";
    } else {
        echo "<p style='color:red;'>Both fields are required.</p>";
    }
}
?>

<div class="messages">
    <h3>Messages:</h3>
    <?php
    $messages = readMessages();
    if (count($messages) > 0) {
        foreach ($messages as $msg) {
    $id = $msg['id'];
    $text = htmlspecialchars($msg['text']);
    echo "<div class='message'>";
    echo $text;
    echo " <a href='?delete=$id' style='color:red;'>[Delete]</a>";
    echo " <a href='?edit=$id' style='color:blue;'>[Edit]</a>";
    echo "</div>";
}

    } else {
        echo "<p>No messages yet.</p>";
    }
    ?>
</div>

</body>
</html>
