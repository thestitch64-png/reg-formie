<?php
// Always read from /tmp because Render allows writes only there
$tmpFile = '/tmp/registrations.txt';

// Try fallback (in case you’re testing locally)
$localFile = __DIR__ . '/registrations.txt';

// Use whichever exists
$file = file_exists($tmpFile) ? $tmpFile : $localFile;

echo "<div style='
    font-family:Poppins,sans-serif;
    background:#fff;
    max-width:800px;
    margin:50px auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
'>
<h2 style='color:#5563DE;text-align:center;'>All Applications 📄</h2>";

if (file_exists($file) && filesize($file) > 0) {
    $lines = file($file);
    echo "<ul style='list-style:none;padding:0;'>";
    foreach ($lines as $line) {
        echo "<li style='
            margin:10px 0;
            padding:10px;
            border-bottom:1px solid #ddd;
            background:#f9f9ff;
            border-radius:5px;
        '>$line</li>";
    }
    echo "</ul>";
} else {
    echo "<p style='text-align:center;color:#777;'>No applications yet.</p>";
}

echo "<div style='text-align:center;margin-top:20px;'>
<a href='index.html' style='
    background:#5563DE;
    color:white;
    padding:10px 20px;
    border-radius:6px;
    text-decoration:none;
'>Go Back</a>
</div></div>";
?>
