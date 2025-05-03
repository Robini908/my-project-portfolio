<?php
// Display PHP version
echo "PHP Version: " . PHP_VERSION . "\n\n";

// Check if PDO is available
echo "PDO Available: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "\n";

// Check PDO drivers
if (extension_loaded('pdo')) {
    echo "PDO Drivers: " . implode(', ', PDO::getAvailableDrivers()) . "\n";
} else {
    echo "PDO Drivers: None (PDO not available)\n";
}

// Check specific SQLite extension
echo "SQLite3 Extension: " . (extension_loaded('sqlite3') ? 'Yes' : 'No') . "\n";
echo "PDO SQLite Extension: " . (extension_loaded('pdo_sqlite') ? 'Yes' : 'No') . "\n\n";

// Check other common extensions
$extensions = [
    'mbstring', 'openssl', 'curl', 'json', 'fileinfo',
    'tokenizer', 'xml', 'ctype', 'bcmath', 'zip'
];

echo "Other Laravel Required Extensions:\n";
foreach ($extensions as $ext) {
    echo "- $ext: " . (extension_loaded($ext) ? 'Yes' : 'No') . "\n";
}

// Environment info
echo "\nEnvironment Info:\n";
echo "- Operating System: " . PHP_OS . "\n";
echo "- Server API: " . php_sapi_name() . "\n";
echo "- Memory Limit: " . ini_get('memory_limit') . "\n";
echo "- Max Execution Time: " . ini_get('max_execution_time') . " seconds\n";
echo "- Upload Max Filesize: " . ini_get('upload_max_filesize') . "\n";
echo "- Post Max Size: " . ini_get('post_max_size') . "\n";
