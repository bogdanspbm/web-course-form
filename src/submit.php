<!DOCTYPE html>
<html lang="en">
<style>
    @import "styles/styles.css";
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
</head>
<body>
<div class="form-container">
<h2>Form Submission Result</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $upKey = ucfirst($key);
        if (!is_array($value)) {
            echo "<p style='margin: 0;'><strong>$upKey:</strong> $value</p>";
        } else {
            echo "<p style='margin: 0;'><strong>$upKey:</strong> " . implode(", ", $value) . "</p>";
        }
    }
    if(isset($_FILES['file'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        echo "<p style='margin: 0;'><strong>File:</strong> <a href='uploads/".$file_name."' target='_blank'>".$file_name."</a></p>";
    }
} else {
    echo "<p>No data submitted</p>";
}
?>
</div>
</body>
</html>