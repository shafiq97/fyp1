    <!------side bar------>
<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="side-bar">
    <div class="p-3 sidebar-content">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" id="close-side-bar" class="btn-close close-side-bar" aria-label="Close"></button>
        </div>
        
        <div class="profile text-center mb-4">
            <?php if(isset($_SESSION['user_id'])): ?>
                <?php 
                    $avatarPath = 'images/avatars/male.png'; // Default to male avatar
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] === 'female') {
                        $avatarPath = 'images/avatars/female.png';
                    }
                ?>
                <img src="<?php echo $avatarPath; ?>" alt="User Avatar" class="rounded-circle mb-3" width="80">
                <h5 class="mb-1"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                <span class="badge bg-secondary">Student</span>
            <?php else: ?>
                <img src="images/user.jpg" alt="" class="rounded-circle mb-3" width="80">
                <h5 class="mb-1">Guest User</h5>
            <?php endif; ?>
        </div>

        <nav class="navbar flex-column">
            <div class="list-group">
                <a href="module.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-book me-2"></i> Module
                </a>
                <a href="simulation.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-shield me-2"></i> Simulation
                </a>
                <a href="history.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-history me-2"></i> Real-World Scenario
                </a>
            </div>
        </nav>
    </div>
</div>