function saveMessage($name, $message, $filename = "messages.txt") {
    $entry = date("Y-m-d H:i:s") . " | " . htmlspecialchars($name) . ": " . htmlspecialchars($message) . "\n";

    $file = @fopen($filename, "a"); // Suppress warning with @
    if (!$file) {
        echo "<p style='color:red;'>❌ ERROR: Unable to open file for writing. Check permissions.</p>";
        return;
    }

    fwrite($file, $entry);
    fclose($file);
}
