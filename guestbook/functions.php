<?php
function saveMessage($name, $message, $filename = "messages.txt") {
    $entry = date("Y-m-d H:i:s") . " | " . htmlspecialchars($name) . ": " . htmlspecialchars($message) . "\n";
    $file = fopen($filename, "a");
    fwrite($file, $entry);
    fclose($file);
}

function readMessages($filename = "messages.txt") {
    if (!file_exists($filename) || !is_readable($filename)) {
        return [];
    }

    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    $messages = [];

    foreach ($lines as $index => $line) {
        $messages[] = ['id' => $index, 'text' => $line];
    }

    return array_reverse($messages); // newest on top
}

