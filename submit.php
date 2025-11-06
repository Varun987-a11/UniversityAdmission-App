<?php
/**
 * University Admission Application Submission Handler
 * NOTE: Credentials are placeholders and must be replaced with live values
 * when deploying to a web server.
 */

// --- STEP 1: DEFINE YOUR DATABASE CONNECTION DETAILS ---
// **SECURITY WARNING**: NEVER COMMIT LIVE CREDENTIALS TO A PUBLIC REPOSITORY!
$servername = "YOUR_HOST_HERE (e.g., localhost or sql105.infinityfree.com)"; 
$username = "YOUR_DB_USERNAME (e.g., root or if0_XXXXXXX)"; 
$password = "YOUR_DB_PASSWORD"; 
$dbname = "YOUR_DATABASE_NAME"; 

// --- STEP 2: ESTABLISH CONNECTION ---
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // We die here and output the error for debugging purposes
    die("Connection failed: " . $conn->connect_error);
}


// --- STEP 3: HANDLE FORM SUBMISSION AND INSERT DATA USING PREPARED STATEMENTS ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Collect and clean data
    // Use the null-coalescing operator (??) to safely fetch POST data
    $degree = $_POST['degree'] ?? '';
    $branch = $_POST['branch'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';

    // 2. Prepare the SQL statement (Prevents SQL Injection)
    $sql = "INSERT INTO applications (degree, branch, fullname, email, phone, gender, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    // Bind parameters: 'sssssss' indicates 7 string (s) parameters
    // This securely binds the collected user input to the query structure.
    $stmt->bind_param("sssssss", $degree, $branch, $fullname, $email, $phone, $gender, $address);

    // 3. Execute the statement
    $is_success = $stmt->execute();
    
    $stmt->close();
    $conn->close();

    // --- STEP 4: DISPLAY RESULTS ---
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submitted</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <h1>✅ Application Confirmation</h1>
        <p>Your details have been successfully saved and submitted to our database.</p>
    </div>
    <div class="container">
        <h2>Submitted Application Details</h2>
        <?php if ($is_success): ?>
            <p style="color: green; font-weight: bold;">Database Insert Successful!</p>
            <hr>
            <p><strong>Application Status:</strong> Received</p>
            <p><strong>Degree Program:</strong> <?php echo htmlspecialchars($degree); ?></p>
            <p><strong>Branch/Specialization:</strong> <?php echo htmlspecialchars($branch); ?></p>
            <hr>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($fullname); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
            <p><strong>Mailing Address:</strong><br><?php echo nl2br(htmlspecialchars($address)); ?></p>
        <?php else: ?>
            <p style="color: red; font-weight: bold;">Error saving data to database. (Check connection and table schema.)</p>
        <?php endif; ?>

        <a href="index.html" style="display: block; text-align: center; margin-top: 20px; color: #4CAF50; text-decoration: none; padding: 10px; border: 1px solid #4CAF50; border-radius: 5px;">
            Start a New Application
        </a>
    </div>
</body>
</html>

<?php 
} else {
    // Redirect if the page is accessed without form submission
    header("Location: index.html");
    exit();
}
?>
