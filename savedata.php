<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);
    $address = htmlspecialchars($_POST['address']);

    $data = "Name: $name | Email: $email | Phone: $phone | Course: $course | Address: $address\n";
    file_put_contents("registrations.txt", $data, FILE_APPEND | LOCK_EX);

    echo "<div style='
        font-family:Poppins,sans-serif;
        background:#f4f4f4;
        padding:40px;
        border-radius:10px;
        text-align:center;
        margin:40px auto;
        max-width:600px;
        box-shadow:0 5px 15px rgba(0,0,0,0.2);
    '>
        <h2 style='color:#5563DE;'>Application Submitted Successfully ✅</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Course:</strong> $course</p>
        <p><strong>Address:</strong> $address</p>
        <a href='showdata.php' style='display:inline-block;margin-top:20px;padding:10px 20px;background:#5563DE;color:#fff;border-radius:6px;text-decoration:none;'>View All Applications</a>
    </div>";
}
?>
