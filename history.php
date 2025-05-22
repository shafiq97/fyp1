<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set current page for active sidebar item
$currentPage = 'history';

// Include header
include 'header.php';
?>

<!-- Main Content -->
<main class="flex-grow-1">
    <!-- History/Real-World Scenarios Page with Bootstrap -->
    <div class="container content-container mx-auto">
       <div class="p-4 bg-white rounded shadow-sm">
          <h1 class="text-center mb-4">Real-World Malware Scenarios</h1>
          <p class="lead text-center mb-5">Learn about famous malware incidents throughout computing history.</p>
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              <div class="col mb-4 d-flex align-items-stretch">
                <div class="card h-100 border-0 shadow-sm text-center w-100">
                   <img src="images/iloveyou.jpg" alt="ILOVEYOU Virus" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                   <div class="card-body">
                      <h3 class="card-title">ILOVEYOU Virus</h3>
                      <p class="card-text">An email virus that infected millions of systems worldwide in 2000.</p>
                   </div>
                   <div class="card-footer bg-transparent border-0 pb-4">
                      <a href="iloveyou_history.php" class="btn btn-primary">View Details</a>
                   </div>
                </div>
             </div>
              <div class="col mb-4 d-flex align-items-stretch">
                <div class="card h-100 border-0 shadow-sm text-center w-100">
                   <img src="images/morrisworm.jpg" alt="Morris Worm" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                   <div class="card-body">
                      <h3 class="card-title">Morris Worm</h3>
                      <p class="card-text">The first worm to spread across the internet in 1988.</p>
                   </div>
                   <div class="card-footer bg-transparent border-0 pb-4">
                      <a href="morrisworm_history.php" class="btn btn-primary">View Details</a>
                   </div>
                </div>
             </div>
              <div class="col mb-4 d-flex align-items-stretch">
                <div class="card h-100 border-0 shadow-sm text-center w-100">
                   <img src="images/zeustrojan.jpg" alt="Zeus Trojan" class="card-img-top p-3" style="max-height: 200px; object-fit: contain;">
                   <div class="card-body">
                      <h3 class="card-title">Zeus Trojan</h3>
                      <p class="card-text">A sophisticated banking trojan that stole financial information.</p>
                   </div>
                   <div class="card-footer bg-transparent border-0 pb-4">
                      <a href="zeustrojan_history.php" class="btn btn-primary">View Details</a>
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
