<?php
// public/debug.php
// Secure diagnostics helper for Kwéla Beauty Studio cPanel deployment

$secret = $_GET['secret'] ?? '';
$configuredSecret = '${{ secrets.DEPLOY_SECRET }}';

if (empty($secret) || $secret !== $configuredSecret) {
    header('HTTP/1.0 403 Forbidden');
    echo 'Forbidden';
    exit;
}

echo "<html><head><title>Kwéla Studio Diagnostics</title><style>body{font-family:sans-serif;padding:30px;background:#f9f9f9;color:#333;}pre{background:#222;color:#eee;padding:15px;border-radius:5px;overflow-x:auto;}h2{margin-top:30px;border-bottom:1px solid #ccc;padding-bottom:5px;}</style></head><body>";
echo "<h1>Kwéla Studio Deployment Diagnostics</h1>";
echo "<p>PHP Version: <strong>" . PHP_VERSION . "</strong></p>";

$paths = [
    'Vendor Autoload' => '/home/kwec8243/kwela-beauty/vendor/autoload.php',
    'Bootstrap App' => '/home/kwec8243/kwela-beauty/bootstrap/app.php',
    'Environment File' => '/home/kwec8243/kwela-beauty/.env',
    'Storage Path' => '/home/kwec8243/kwela-beauty/storage',
    'Storage Cache' => '/home/kwec8243/kwela-beauty/storage/framework/cache',
    'Storage Views' => '/home/kwec8243/kwela-beauty/storage/framework/views',
    'Storage Sessions' => '/home/kwec8243/kwela-beauty/storage/framework/sessions',
    'Storage Logs' => '/home/kwec8243/kwela-beauty/storage/logs',
    'Bootstrap Cache Directory' => '/home/kwec8243/kwela-beauty/bootstrap/cache',
];

echo "<h2>1. File Existence & Permissions Check:</h2>";
echo "<ul>";
foreach ($paths as $name => $path) {
    $exists = file_exists($path) ? "<span style='color:green;font-weight:bold;'>Exists</span>" : "<span style='color:red;font-weight:bold;'>Not Found</span>";
    $writable = is_writable($path) ? "<span style='color:green;font-weight:bold;'>Writable</span>" : "<span style='color:red;font-weight:bold;'>Not Writable</span>";
    $perms = file_exists($path) ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A';
    
    echo "<li><strong>$name</strong> ($path): $exists | $writable (Perms: $perms)</li>";
}
echo "</ul>";

echo "<h2>2. Latest Laravel logs (storage/logs/laravel.log):</h2>";
$laravelLog = '/home/kwec8243/kwela-beauty/storage/logs/laravel.log';
if (file_exists($laravelLog)) {
    $lines = file($laravelLog);
    if (!empty($lines)) {
        $lastLines = array_slice($lines, -30);
        echo "<pre>" . htmlspecialchars(implode("", $lastLines)) . "</pre>";
    } else {
        echo "<p>Laravel log file is empty.</p>";
    }
} else {
    echo "<p style='color:orange;'>No Laravel log file found at $laravelLog.</p>";
}

echo "<h2>3. Latest Web Server Error Logs (public_html/error_log):</h2>";
$apacheLog = __DIR__ . '/error_log';
if (file_exists($apacheLog)) {
    $lines = file($apacheLog);
    if (!empty($lines)) {
        $lastLines = array_slice($lines, -30);
        echo "<pre>" . htmlspecialchars(implode("", $lastLines)) . "</pre>";
    } else {
        echo "<p>Web server log file is empty.</p>";
    }
} else {
    echo "<p style='color:orange;'>No error_log file found in public_html.</p>";
}

echo "</body></html>";
