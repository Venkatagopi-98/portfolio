<?php

$servername = "sql310.infinityfree.com";
$username = "if0_35997491";
$password = "UE1LcsB07jz3B";
$database = "if0_35997491_porti";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    
    if (empty($name) || empty($email) || empty($comment)) {
        echo "<script>alert('All Fields Required');
            window.location.href = '/portifolio/index.php'; </script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid Email');
        window.location.href = '/portifolio/index.php'; </script>";
    } else {
       
        $sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Comment posted successfully');
            window.location.href = '/index.php'; </script>";
            
 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
