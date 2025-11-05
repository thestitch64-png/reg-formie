<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);

    $data = "Name: $name | Email: $email | Phone: $phone | Course: $course\n";

    $file = "registrations.txt";
    file_put_contents($file, $data, FILE_APPEND);

    echo "success";
} else {
    echo "Invalid request";
}
?>
