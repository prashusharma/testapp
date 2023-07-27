<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Contact Form</title>
</head>

<body>
    <div class="container w-75">
        <div class="heading text-center">
            <h1>Contact Us</h1>
        </div>
        <?php
        if (isset($_GET['error'])) {
            echo "<p style='color: red;'>Please fill in all fields with correct and valid information.</p>";
        } elseif (isset($_GET['success'])) {
            echo "<p style='color: green;'>Your message has been sent successfully.</p>";
        }
        ?>
        <form action="process_form.php" method="post">
            <div class="form-outline mb-4">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="fullname" id="fullname" required maxlength="100">
            </div>
            <div class="form-outline mb-4">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" class="form-control" name="phone" id="phone" required maxlength="15">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required maxlength="100">
            </div>
            <div class="form-outline mb-4">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" class="form-control" name="subject" id="subject" required maxlength="100">
            </div>
            <div class="form-outline mb-4">
                <label for="message" class="form-label">Message:</label>
                <textarea name="message" class="form-control" id="message" required></textarea>
            </div>
            <input type="hidden" name="ip_address" id="ip_address" value="">

            <input type="submit" value="Submit">
        </form>
    </div>
    <script>
        // Function to set the IP address value in the input field
        function setIPAddress() {
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('ip_address').value = data.ip;
                })
                .catch(error => {
                    console.error('Error fetching IP address:', error);
                });
        }

        // Call the function to set the IP address value on page load
        document.addEventListener("DOMContentLoaded", setIPAddress);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>