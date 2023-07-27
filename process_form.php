<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $ip_address = $_POST['ip_address'];

    // Basic form validation
    if (empty($fullname) || empty($phone) || empty($email) || empty($subject) || empty($message)) {
        // Handle validation errors and redirect back to the form with an error message
        header("Location: index.php?error=1");
        exit();
    }

    // Save form data to the database (Assuming you have set up a MySQL database)
    // Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with appropriate values
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_form";
    $table = "contact_form";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO $table (fullname, phone, email, subject, message, ip_address) VALUES ('$fullname', '$phone', '$email', '$subject', '$message', '$ip_address')";

    if ($conn->query($sql) === TRUE) {
        // Database insertion successful
    } else {
        // Handle database insertion error
    }

    $conn->close();

    // Send email notification
    $to = "Prashukumarsharmassm2000@gmail.com";
    $subject = "New Contact Form Submission";
    $message = "Name: $fullname\nPhone: $phone\nEmail: $email\nSubject: $subject\nMessage: $message";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);

    // Redirect back to the form with a success message
    header("Location: index.php?success=1");
    exit();
} else {
    // Handle invalid HTTP method
    header("Location: index.php");
    exit();
}
?>
