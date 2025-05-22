<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set current page for active sidebar item
$currentPage = 'simulation';

// Include header
include 'header.php';
?>

<!-- Main Content -->
<main class="flex-grow-1">
    <!-- Simulation content section with Bootstrap -->
    <div class="container content-container mx-auto">
       <div class="p-4 bg-white rounded shadow-sm">
          <h1 class="text-center mb-4">Explore Malware Simulations</h1>
          <p class="lead text-center mb-5">Watch animations and understand how malware behaves in real-world scenarios.</p>
    
          <div class="row g-4">
             <!-- Virus Card -->
             <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                   <div class="position-relative">
                      <img src="images/virus.png" alt="Virus" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                      <span class="position-absolute top-0 end-0 badge bg-danger m-2">New!</span>
                   </div>
                   <div class="card-body">
                      <h3 class="card-title">VIRUSES</h3>
                      <p class="card-text">Learn about computer viruses and how they infect systems.</p>
                   </div>
                   <div class="card-footer bg-transparent border-0 pb-4">
                      <a href="virus_simulation.php" class="btn btn-primary">View Simulation</a>
                      <a href="direct_virus_simulation.html" class="btn btn-outline-primary mt-2">Direct View</a>
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
                      <a href="playlist.html" class="btn btn-primary">View Playlist</a>
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
                      <a href="playlist.html" class="btn btn-primary">View Playlist</a>
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