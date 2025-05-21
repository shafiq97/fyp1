<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
    
<!-- Content Section -->
<div class="container content-container">
    <div class="welcome-container p-4 bg-white rounded shadow-sm">
        <h1 class="welcome-heading text-center mb-4">Welcome to Your Cybersecurity Learning Platform</h1>
        <p class="welcome-text lead text-center mb-5">Explore modules, interact with simulations, and discover real-world malware scenarios to enhance your cybersecurity knowledge.</p>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                        <h3 class="card-title">Learning Modules</h3>
                        <p class="card-text">Study comprehensive materials about viruses, worms, and trojans</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center pb-4">
                        <a href="module.php" class="btn btn-primary">Explore Modules</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-shield fa-3x mb-3 text-success"></i>
                        <h3 class="card-title">Interactive Simulations</h3>
                        <p class="card-text">Experience how malware behaves through interactive simulations</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center pb-4">
                        <a href="simulation.php" class="btn btn-success">Try Simulations</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-history fa-3x mb-3 text-danger"></i>
                        <h3 class="card-title">Real-World Scenarios</h3>
                        <p class="card-text">Learn about famous malware incidents throughout history</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center pb-4">
                        <a href="history.php" class="btn btn-danger">View Scenarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

    