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
    
    <!-- Critical fix for header-sidebar overlap - highest priority -->
    <style>
        /* Fixed header that doesn't overlap with sidebar - HIGHEST PRIORITY */
        .header {
            position: fixed !important;
            top: 0 !important;
            z-index: 998 !important; /* Lower than sidebar */
            width: 100% !important;
            height: 60px !important;
        }
        
        /* Sidebar must have higher z-index */
        .side-bar {
            z-index: 1100 !important;
        }
        
        /* Desktop view - adjust header to match available space */
        @media (min-width: 992px) {
            .header {
                left: 300px !important; /* Exactly match sidebar width */
                width: calc(100% - 300px) !important; /* Exactly full width minus sidebar */
                max-width: calc(100% - 300px) !important; /* Extra constraint */
            }
            
            main {
                padding-top: 70px !important;
                margin-left: 300px !important;
                width: calc(100% - 300px) !important;
                max-width: calc(100% - 300px) !important;
            }
            
            .flex-grow-1 {
                margin-left: 300px !important;
                width: calc(100% - 300px) !important;
            }
        }
        
        /* Mobile view */
        @media (max-width: 991px) {
            main {
                padding-top: 70px !important;
            }
        }
    </style>
    
    <!-- Critical mobile navigation fix - highest priority -->
    <link rel="stylesheet" href="css/mobile-nav-critical-fix.css">
    <!-- Main sidebar styling - ONLY sidebar CSS needed -->
    <link rel="stylesheet" href="css/sidebar-master.css">
    <!-- Header navigation fix - ensure navigation is visible -->
    <link rel="stylesheet" href="css/header-nav-fix.css">
    <!-- Global font size fix -->
    <link rel="stylesheet" href="css/global-font-fix.css">
    <!-- Custom cursor fix -->
    <link rel="stylesheet" href="css/cursor-fix.css">
    <!---- CSS File Link ---->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/timeline_fix.css">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/gender_selection.css">
    <link rel="stylesheet" href="css/bootstrap-layout.css">
    <link rel="stylesheet" href="css/page-specific.css">
    <link rel="stylesheet" href="css/logo-fix.css">
    <!-- Other layout fixes -->
    <link rel="stylesheet" href="css/header-size-fix.css">
    <link rel="stylesheet" href="css/header-layout-fix.css">
    <link rel="stylesheet" href="css/timeline-container-fix.css">
    <link rel="stylesheet" href="css/emergency-timeline-fix.css">
    <link rel="stylesheet" href="css/timeline-space-fix.css">
    <link rel="stylesheet" href="css/timeline-responsive-fix.css">
    <!---- Font Awesome CDN Link ---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Consolidated Sidebar Toggle Script -->
    <script src="js/sidebar-toggle-fix.js" defer></script>
    <!-- Timeline scripts -->
    <script src="js/timeline-position-fix.js" defer></script>
    <script src="js/timeline-uniform.js" defer></script>
</head>

<?php
// Determine which page is active
$current_page = 'dashboard-page';
$current_file = basename($_SERVER['PHP_SELF']);

if ($current_file === 'dashboard.php') {
    $current_page .= ' dashboard-home';
} elseif ($current_file === 'history.php') {
    $current_page .= ' history-page';
} elseif ($current_file === 'module.php') {
    $current_page .= ' module-page';
} elseif ($current_file === 'simulation.php') {
    $current_page .= ' simulation-page';
}
?>

<body class="<?php echo $current_page; ?>">
<div class="d-flex">
    <?php include_once 'sidebar.php'; ?>
    <div class="flex-grow-1 d-flex flex-column">
        <!-- Bootstrap navbar header inside content column -->
        <header class="header navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2" style="position: fixed !important; z-index: 998 !important; top: 0 !important; width: calc(100% - 300px) !important; left: 300px !important; @media (max-width: 991px) { width: 100% !important; left: 0 !important; }">
            <div class="d-flex justify-content-between align-items-center w-100" style="padding-left:0;padding-right:2rem;">
                <a href="dashboard.php" class="navbar-brand ms-0 ps-0 d-flex align-items-center" style="margin-left:0;padding-left:0;">
                    <img src="images/logo.png" alt="Website Logo" height="40" style="padding-top:10px;">
                </a>
                <button id="menu-btn" class="navbar-toggler d-lg-none ms-2" type="button" aria-label="Toggle sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
        <main class="flex-grow-1" style="padding-top:60px;">
            <!-- ...existing code for your page content... -->
        </main>
    </div>
</div>
</body>
</html>