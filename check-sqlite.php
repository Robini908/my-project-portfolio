<?php

// Check if PDO is available
echo "PDO Available: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "\n";

// Check PDO drivers
if (extension_loaded('pdo')) {
    echo "PDO Drivers: " . implode(', ', PDO::getAvailableDrivers()) . "\n";
} else {
    echo "PDO Drivers: None (PDO not available)\n";
}

// Check if SQLite3 extension is available
echo "SQLite3 Extension: " . (extension_loaded('sqlite3') ? 'Yes' : 'No') . "\n";

// Check if PDO SQLite extension is available
echo "PDO SQLite Extension: " . (extension_loaded('pdo_sqlite') ? 'Yes' : 'No') . "\n";
