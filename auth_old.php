<?php
// Start the session
session_start();

// Include database connection
require_once 'includes/db_connect.php';

// Initialize variables
$error = "";
$success = "";

// Redirect to login.php if login is requested
if (isset($_GET['action']) && $_GET['action'] === 'login') {
    header("Location: login.php");
    exit;
}

// Check if the form was submitted for signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $username = trim($_POST['username'] ?? '');
    
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
                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        
                        // Insert the new user
                        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss", $username, $email, $hashed_password);
                        
                        if ($stmt->execute()) {
                            $success = "Account created successfully! You can now login.";
                            
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
                        }
                    }
                }
            } else if ($_POST['action'] == 'login') {
                // This is a login request
                
                // Check if user exists
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    
                    // Verify password
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, set session variables
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['email'] = $user['email'];
                        
                        // Redirect to profile page
                        header("Location: profile.php");
                        exit;
                    } else {
                        $error = "Invalid password. Please try again.";
                    }
                } else {
                    $error = "Email not found. Please check your email or signup.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In and Sign Up Form</title>
    <link rel="stylesheet" href="css/auth.css">
    <script src="https://kit.fontawesome.com/1778b10dea.js" crossorigin="anonymous"></script>
</head>

<body class="auth-page">
    <div class="container-auth">
        <div class="form-box">
            <h1 id="title"><?php echo $formMode === 'login' ? 'Sign In' : 'Sign Up'; ?></h1>
            <form id="authForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                
                <div class="input-group">
                    <!-- Name Field (Only Visible for Sign Up) -->
                    <div class="input-field" id="nameField" style="<?php echo $formMode === 'login' ? 'max-height: 0;' : 'max-height: 60px;'; ?>">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Name">

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
                </div>

                <!-- Sign In / Sign Up Buttons -->
                <div class="btn-field">
                    <button type="submit" id="signupBtn" name="action" value="signup" class="<?php echo $formMode === 'login' ? 'disable' : ''; ?> <?php echo $formMode === 'signup' ? 'active-toggle' : ''; ?>">Sign Up</button>
                    <button type="submit" id="signinBtn" name="action" value="login" class="<?php echo $formMode === 'signup' ? 'disable' : ''; ?> <?php echo $formMode === 'login' ? 'active-toggle' : ''; ?>">Sign In</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let signupBtn = document.getElementById("signupBtn");
        let signinBtn = document.getElementById("signinBtn");
        let nameField = document.getElementById("nameField");
        let title = document.getElementById("title");
        let authForm = document.getElementById("authForm");

        // Toggle between Sign Up and Sign In
        signinBtn.onclick = function(e) {
            if (signinBtn.classList.contains("active-toggle")) {
                // Let the form submission proceed
                return true;
            }
            
            // Otherwise this is a UI toggle, prevent form submission
            e.preventDefault();
            
            nameField.style.maxHeight = "0";
            title.innerHTML = "Sign In";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
            
            // Mark this button as the active submission button
            signupBtn.classList.remove("active-toggle");
            signinBtn.classList.add("active-toggle");
            
            return false;
        }

        signupBtn.onclick = function(e) {
            if (signupBtn.classList.contains("active-toggle")) {
                // Let the form submission proceed
                return true;
            }
            
            // Otherwise this is a UI toggle, prevent form submission
            e.preventDefault();
            
            nameField.style.maxHeight = "60px";
            title.innerHTML = "Sign Up";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
            
            // Mark this button as the active submission button
            signinBtn.classList.remove("active-toggle");
            signupBtn.classList.add("active-toggle");
            
            return false;
        }

        // No need for initialization as we handle the form mode in PHP now
        // Initialize form based on the current active state
        window.onload = function() {
            // The form is already initialized with PHP
            // Just make sure the right button has the active-toggle class
            if (title.innerHTML === "Sign In") {
                signinBtn.classList.add("active-toggle");
                signupBtn.classList.remove("active-toggle");
            } else {
                signupBtn.classList.add("active-toggle");
                signinBtn.classList.remove("active-toggle");
            }
        }
    </script>
</body>
</html>
