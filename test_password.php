<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// The known working password from users_setup.sql
$password = 'password123';
$stored_hash = '$2y$10$8nFE2/0gXoAk5Jb4sK0Zj.LQq0zk7YXuCk5wPUFI0ZugSAx7pQohW';

echo "Testing password verification:\n";
echo "Password being tested: " . $password . "\n";
echo "Stored hash: " . $stored_hash . "\n";
echo "Verification result: " . (password_verify($password, $stored_hash) ? "SUCCESS" : "FAILED") . "\n";

// Generate a new hash for comparison
$new_hash = password_hash($password, PASSWORD_DEFAULT);
echo "\nGenerating new hash for same password:\n";
echo "New hash: " . $new_hash . "\n";
echo "Verification with new hash: " . (password_verify($password, $new_hash) ? "SUCCESS" : "FAILED") . "\n";

// Test the info of both hashes
echo "\nHash info for stored hash:\n";
print_r(password_get_info($stored_hash));
echo "\nHash info for new hash:\n";
print_r(password_get_info($new_hash));
?>
