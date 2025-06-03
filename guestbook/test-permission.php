<?php
$file = 'messages.txt';

if (file_exists($file)) {
    echo "File exists.<br>";
    if (is_readable($file)) {
        echo "File is readable.<br>";
    } else {
        echo "File is NOT readable.<br>";
    }

    if (is_writable($file)) {
        echo "File is writable.<br>";
    } else {
        echo "File is NOT writable.<br>";
    }
} else {
    echo "File does NOT exist.";
}
?>
