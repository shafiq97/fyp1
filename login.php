<?php
// Start the session
session_start();

// Include database connection
require_once 'includes/db_connect.php';

// Initialize variables
$error = "";
$success = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and trim inputs
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password'] ?? '');
    
    // Validate email and password are not empty
    if (empty($email) || empty($password)) {
        $error = "Please fill in all required fields.";
    } else {
        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to profile page
            header("Location: profile.php");
            exit;
        } else {
            $error = "Invalid email or password. Please try again.";
            error_log("Login failed for user: " . $email);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/auth.css">
    <script src="https://kit.fontawesome.com/1778b10dea.js" crossorigin="anonymous"></script>
</head>

<body class="auth-page">
    <div class="container-auth">
        <div class="form-box">
            <h1>Sign In</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-group">
                    <!-- Email Input -->
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>

                    <!-- Password Input -->
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <p>Forgot Password? <a href="#">Click Here!</a></p>

                    <!-- Error/Success Message Box -->
                    <?php if (!empty($error)): ?>
                        <p class="error-message" style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <p class="success-message" style="color: green;"><?php echo $success; ?></p>
                    <?php endif; ?>
                    
                    <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
                </div>

                <!-- Sign In Button -->
                <div class="btn-field">
                    <button type="submit" style="width: 100%;" class="btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
