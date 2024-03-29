<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
</head>
<body>
<h2>Form Submission Result</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (!is_array($value)) {
            echo "<p>$key: $value</p>";
        } else {
            echo "<p>$key: " . implode(", ", $value) . "</p>";
        }
    }
    if(isset($_FILES['file'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        echo "<p>File: <a href='uploads/".$file_name."' target='_blank'>".$file_name."</a></p>";
    }
} else {
    echo "<p>No data submitted</p>";
}
?>
</body>
</html>