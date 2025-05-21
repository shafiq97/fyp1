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
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $username = trim($_POST['username']);
    
    // Validate all fields are not empty
    if (empty($email) || empty($password) || empty($username)) {
        $error = "Please fill in all required fields.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = "Email already registered. Please use a different email or login.";
        } else {
            // Insert the new user with plain text password
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password);
            
            if ($stmt->execute()) {
                $success = "Account created successfully!";
                
                // Get the user ID for the session
                $user_id = $conn->insert_id;
                
                // Set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                
                // Redirect to profile page
                header("Location: profile.php");
                exit;
            } else {
                $error = "Error creating account: " . $conn->error;
                error_log("Database error during user creation: " . $conn->error);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/auth.css">
    <script src="https://kit.fontawesome.com/1778b10dea.js" crossorigin="anonymous"></script>
</head>

<body class="auth-page">
    <div class="container-auth">
        <div class="form-box">
            <h1>Sign Up</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-group">
                    <!-- Name Field -->
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Name">
                    </div>

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

                    <!-- Error/Success Message Box -->
                    <?php if (!empty($error)): ?>
                        <p class="error-message" style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <p class="success-message" style="color: green;"><?php echo $success; ?></p>
                    <?php endif; ?>
                    
                    <p>Already have an account? <a href="login.php">Sign In here</a></p>
                </div>

                <!-- Sign Up Button -->
                <div class="btn-field">
                    <button type="submit" style="width: 100%;" class="btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
                    
                    <p>Already have an account? <a href="login.php">Sign In here</a></p>
                </div>

                <!-- Sign Up Button -->
                <div class="btn-field">
                    <button type="submit" style="width: 100%;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
