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
    <title>Malware Modules</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <!-- Module-specific CSS -->
    <link rel="stylesheet" href="css/module.css">
    <link rel="stylesheet" href="css/module-container-expand.css">
    <link rel="stylesheet" href="css/module-cards-expand.css">
    <link rel="stylesheet" href="css/module-grid-fix.css">
    
    <!-- Critical mobile navigation fix -->
    <link rel="stylesheet" href="css/mobile-nav-critical-fix.css">
    <link rel="stylesheet" href="css/sidebar-emergency-fix.css">
    <link rel="stylesheet" href="css/header-nav-fix.css">
    
    <!-- Global styles -->
    <link rel="stylesheet" href="css/global-font-fix.css">
    <link rel="stylesheet" href="css/cursor-fix.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/logo-fix.css">
    
    <!-- Sidebar styling -->
    <link rel="stylesheet" href="css/sidebar-module-fix.css">
    <link rel="stylesheet" href="css/sidebar-spacing-fix.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="dashboard-page module-page">
    <div class="d-flex">
        <!-- Include sidebar once -->
        <?php include 'sidebar.php'; ?>
        
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Header -->
            <header class="header navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
                <div class="d-flex justify-content-between align-items-center w-100" style="padding-left:0;padding-right:2rem;">
                    <a href="dashboard.php" class="navbar-brand ms-0 ps-0 d-flex align-items-center" style="margin-left:0;padding-left:0;">
                        <img src="images/logo.png" alt="Website Logo" height="40" style="padding-top:10px;">
                    </a>
                    <button id="menu-btn" class="navbar-toggler d-lg-none ms-2" type="button" aria-label="Toggle sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse" id="navbarNav">
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
            
            <!-- Main Content -->
            <main class="flex-grow-1">
                <!-- Module content section with Bootstrap -->
                <div class="container content-container mx-auto">
                   <div class="p-4 bg-white rounded shadow-sm">
                      <h1 class="text-center mb-4">Explore Malware Modules</h1>
                      <p class="lead text-center mb-5">Learn about different types of malware and understand their behavior.</p>
                
                      <div class="row g-4">
                         <!-- Virus Card -->
                         <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                               <img src="images/virus.png" alt="Virus" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                               <div class="card-body">
                                  <h3 class="card-title">VIRUSES</h3>
                                  <p class="card-text">Learn about computer viruses and how they infect systems.</p>
                               </div>
                               <div class="card-footer bg-transparent border-0 pb-4">
                                  <a href="virus_module.php" class="btn btn-primary">View Module</a>
                               </div>
                            </div>
                         </div>
                
                         <!-- Worm Card -->
                         <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                               <img src="images/worms.png" alt="Worms" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                               <div class="card-body">
                                  <h3 class="card-title">WORMS</h3>
                                  <p class="card-text">Explore how worms spread across networks and systems.</p>
                               </div>
                               <div class="card-footer bg-transparent border-0 pb-4">
                                  <a href="worm_module.php" class="btn btn-primary">View Module</a>
                               </div>
                            </div>
                         </div>
                
                         <!-- Trojan Card -->
                         <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                               <img src="images/trojans.png" alt="Trojans" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                               <div class="card-body">
                                  <h3 class="card-title">TROJANS</h3>
                                  <p class="card-text">Discover how trojans disguise themselves as legitimate software.</p>
                               </div>
                               <div class="card-footer bg-transparent border-0 pb-4">
                                  <a href="trojan_module.php" class="btn btn-primary">View Module</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Scripts - proper order matters -->
    <script src="bootstrap.bundle.min.js"></script>
    <script src="js/sidebar-visibility-fix.js"></script>
    <script src="js/mobile-nav-critical-fix.js"></script>
    <script src="js/header-nav-fix.js"></script>
    
</body>
</html>