<?php
// MySQLi credentials config
$DB_username = 's5525620';
$DB_password = 'xjFAR3HjVmULPyUTzoHozzqKXfzdp7Ey';
$DB_host = 'db.bucomputing.uk';
$DB_port = 6612;
$DB = 's5525620';

// Open database connection
    // Initialise SQL
$connection = mysqli_init();
if (!$connection) {
    // Initialization error
    echo "<p>Initializing MySQLi failed.</p>";
} else {
    // Establish secure connection using SSL
    mysqli_ssl_set($connection, NULL, NULL, NULL, '/public_html/sys_tests', NULL);
    // Establish connection
    mysqli_real_connect($connection, $DB_host, $DB_username, $DB_password, $DB, $DB_port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
    if (mysqli_connect_errno()) {
        // Connection error
        echo "<p>Failed to connect to MySQL. " .
            "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error() . "</p>";
    }
}
/* !!!WARNING, THE CONNECTION IS LEFT OPEN!!! */