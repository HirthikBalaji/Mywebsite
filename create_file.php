<?php

// Check if the POST request contains user input
if (isset($_POST['userInput'])) {
    // Retrieve user input from the POST request
    $userInput = $_POST['userInput'];

    // Set the file path and name
    $filename = 'user_input.txt';

    // Attempt to create or overwrite the file with the user input
    $file = fopen($filename, 'w');
    if ($file) {
        fwrite($file, $userInput);
        fclose($file);

        // File creation was successful
        echo json_encode(['success' => true]);
    } else {
        // File creation failed
        echo json_encode(['success' => false]);
    }
} else {
    // No user input provided
    echo json_encode(['success' => false]);
}

?>
