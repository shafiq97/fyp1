<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php?action=login");
    exit;
}

// Include database connection
require_once 'includes/db_connect.php';

// Initialize variables
$error = "";
$success = "";

// Handle form submission for profile updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the tab that was used for submission
    $submission_tab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';
    
    // Always get username as it's required for any update
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $new_password = '';
    $confirm_password = '';
    $gender = '';
    
    if ($submission_tab === 'security') {
        $new_password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
    } else if ($submission_tab === 'profile') {
        $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    }

    // Validate username is not empty
    if (empty($username)) {
        $error = "Username cannot be empty";
    } else if ($submission_tab === 'security' && !empty($new_password) && $new_password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        if ($submission_tab === 'profile') {
            // Update the username and gender in the database
            $stmt = $conn->prepare("UPDATE users SET username = ?, gender = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $gender, $_SESSION['user_id']);
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                $_SESSION['gender'] = $gender;
                $success = "Profile updated successfully!";
            } else {
                $error = "Error updating profile: " . $conn->error;
            }
        } else if ($submission_tab === 'security' && !empty($new_password)) {
            // Using plain text as per client request
            $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $new_password, $_SESSION['user_id']);
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                $success = "Password updated successfully!";
            } else {
                $error = "Error updating password: " . $conn->error;
            }
        }
    }
}

// Get the latest user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Set gender in session if available
if (isset($user['gender']) && !empty($user['gender'])) {
    $_SESSION['gender'] = $user['gender'];
}

// Get the user's registration date
$registration_date = new DateTime($user['created_at']);
$current_date = new DateTime();
$account_age = $registration_date->diff($current_date)->days;

// Get current active tab
$active_tab = $_GET['tab'] ?? 'profile';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | <?php echo htmlspecialchars($user['username']); ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/bootstrap-layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="dashboard-page">

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="container content-container">
    <div class="profile-container shadow-sm rounded">
        <!-- Profile Header -->
        <div class="profile-header bg-light p-4 rounded-top d-flex flex-column flex-md-row align-items-center">
            <div class="profile-avatar me-md-4 mb-3 mb-md-0">
                <img src="images/user.jpg" alt="User Avatar" class="rounded-circle" width="100">
            </div>
            <div class="profile-info text-center text-md-start">
                <h2 class="mb-2"><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="mb-1"><i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($user['email']); ?></p>
                <p class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Member since <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
            </div>
        </div>
          <!-- Profile Stats -->
        <div class="profile-stats row text-center my-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="stat-box bg-light p-3 rounded h-100">
                    <h3 class="display-6"><?php echo $account_age; ?></h3>
                    <p class="mb-0">Days as Member</p>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="stat-box bg-light p-3 rounded h-100">
                    <h3 class="display-6">4</h3>
                    <p class="mb-0">Modules Completed</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box bg-light p-3 rounded h-100">
                    <h3 class="display-6">15</h3>
                    <p class="mb-0">Simulations Run</p>
                </div>
            </div>
        </div>
          <!-- Profile Tabs -->
        <div class="profile-tabs">
            <div class="tab-buttons">
                <button class="tab-btn btn <?php echo $active_tab === 'profile' ? 'btn-primary' : 'btn-light'; ?>" onclick="openTab('profile')">
                    <i class="fas fa-user me-2"></i>Profile Info
                </button>
                <button class="tab-btn btn <?php echo $active_tab === 'security' ? 'btn-primary' : 'btn-light'; ?>" onclick="openTab('security')">
                    <i class="fas fa-lock me-2"></i>Security
                </button>
                <button class="tab-btn btn <?php echo $active_tab === 'activity' ? 'btn-primary' : 'btn-light'; ?>" onclick="openTab('activity')">
                    <i class="fas fa-chart-line me-2"></i>Activity
                </button>
            </div>
            
            <!-- Messages Section -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($success)): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                </div>
            <?php endif; ?>
              <!-- Profile Tab Content -->
            <div id="profile" class="tab-content card p-4 mt-3 border-0 shadow-sm <?php echo $active_tab === 'profile' ? 'd-block' : 'd-none'; ?>">
                <form class="profile-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label"><i class="fas fa-user me-2"></i>Full Name:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                    </div>

                    <!-- Gender Selection -->
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-venus-mars me-2"></i>Select Avatar:</label>
                        <div class="gender-options d-flex justify-content-center">
                            <div class="gender-option p-3 text-center <?php echo (isset($user['gender']) && $user['gender'] === 'male') ? 'selected' : ''; ?>" data-gender="male">
                                <img src="images/avatars/male.png" alt="Male Avatar" class="img-fluid rounded-circle mb-2" width="80">
                                <div>Male</div>
                                <input type="radio" name="gender" value="male" <?php echo (isset($user['gender']) && $user['gender'] === 'male') ? 'checked' : ''; ?> style="display: none;">
                            </div>
                            <div class="gender-option p-3 text-center <?php echo (isset($user['gender']) && $user['gender'] === 'female') ? 'selected' : ''; ?>" data-gender="female">
                                <img src="images/avatars/female.png" alt="Female Avatar" class="img-fluid rounded-circle mb-2" width="80">
                                <div>Female</div>
                                <input type="radio" name="gender" value="female" <?php echo (isset($user['gender']) && $user['gender'] === 'female') ? 'checked' : ''; ?> style="display: none;">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save me-2"></i>Update Profile</button>
                </form>
            </div>
              <!-- Security Tab Content -->
            <div id="security" class="tab-content card p-4 mt-3 border-0 shadow-sm <?php echo $active_tab === 'security' ? 'd-block' : 'd-none'; ?>">
                <form class="profile-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?tab=security">
                    <div class="mb-3">
                        <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>New Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                    </div>
                    
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label"><i class="fas fa-lock me-2"></i>Confirm New Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                    </div>
                    
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-key me-2"></i>Update Password</button>
                </form>
            </div>
            
            <!-- Activity Tab Content -->
            <div id="activity" class="tab-content card p-4 mt-3 border-0 shadow-sm <?php echo $active_tab === 'activity' ? 'd-block' : 'd-none'; ?>">
                <h4 class="mb-4"><i class="fas fa-history me-2"></i>Recent Activity</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <div>Completed Virus Module <span class="badge bg-secondary ms-2">2 days ago</span></div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <div>Completed Trojan Module <span class="badge bg-secondary ms-2">1 week ago</span></div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <div>Completed Worm Module <span class="badge bg-secondary ms-2">2 weeks ago</span></div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <div>Completed Simulation <span class="badge bg-secondary ms-2">3 weeks ago</span></div>
                    </li>
                </ul>
            </div>
        </div>        
        <!-- Logout Section -->
        <div class="mt-4 text-center">
            <a href="logout.php" class="btn btn-danger">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- JavaScript for tab functionality and gender selection -->
<script src="bootstrap.bundle.min.js"></script>
<script>
function openTab(tabName) {
    // Hide all tabs
    var tabContents = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("d-block");
        tabContents[i].classList.add("d-none");
    }
    
    // Deactivate all tab buttons
    var tabButtons = document.getElementsByClassName("tab-btn");
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("btn-primary");
        tabButtons[i].classList.add("btn-light");
    }
    
    // Show the selected tab
    document.getElementById(tabName).classList.remove("d-none");
    document.getElementById(tabName).classList.add("d-block");
    
    // Activate the clicked button
    event.currentTarget.classList.remove("btn-light");
    event.currentTarget.classList.add("btn-primary");
    
    // Update URL without page refresh
    var url = new URL(window.location);
    url.searchParams.set('tab', tabName);
    window.history.pushState({}, '', url);
}

// Gender selection functionality
document.addEventListener('DOMContentLoaded', function() {
    const genderOptions = document.querySelectorAll('.gender-option');
    
    genderOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            genderOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Set the radio input as checked
            const radioInput = this.querySelector('input[type="radio"]');
            radioInput.checked = true;
        });
    });
    
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
    
    // Fix for the sidebar toggle in mobile view
    const menuBtn = document.querySelector('#menu-btn');
    const sideBar = document.querySelector('.side-bar');
    
    if (menuBtn && sideBar) {
        menuBtn.addEventListener('click', function() {
            sideBar.classList.toggle('active');
        });
    }
});
</script>

</body>
</html>
