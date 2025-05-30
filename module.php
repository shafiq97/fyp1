<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set current page for active sidebar item
$currentPage = 'module';

// Include header
include 'header.php';
?>

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

<?php
// Include footer
include 'footer.php';
?>