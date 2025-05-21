<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <!---- CSS File Link ---->
    <link rel="stylesheet" href="css/dashboard.css">    <link rel="stylesheet" href="css/timeline_fix.css">    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/gender_selection.css">
    <link rel="stylesheet" href="css/bootstrap-layout.css">
    <link rel="stylesheet" href="css/page-specific.css">

    <!---- Font Awesome CDN Link ---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<?php
// Determine which page is active
$current_page = 'dashboard-page';
$current_file = basename($_SERVER['PHP_SELF']);

if ($current_file === 'history.php') {
    $current_page .= ' history-page';
} elseif ($current_file === 'module.php') {
    $current_page .= ' module-page';
} elseif ($current_file === 'simulation.php') {
    $current_page .= ' simulation-page';
}
?>

<body class="<?php echo $current_page; ?>">    
    <header class="header navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
        <div class="container-fluid">            
            <!-- Logo -->
            <a href="dashboard.php" class="navbar-brand">
                <img src="images/logo.png" alt="Website Logo" height="40">
            </a>
            <!-- Sidebar Toggle Button (only visible on mobile) -->
            <button id="menu-btn" class="navbar-toggler d-lg-none ms-2" type="button" aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Signup</a>
                        </li>
                    <?php endif; ?>                    
                </ul>
            </div>
        </div>
    </header>
</body>
</html>