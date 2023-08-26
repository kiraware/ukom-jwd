<?php
    /**
     * Trying to connect
     * HOST = 'localhost'
     * USER = 'root'
     * PASSWORD = ''
     * DATABASE = 'ukom'
     * */
    $con = new mysqli('localhost', 'root', '', 'ukom');

    // Checking connection
    if (!$con) {
        // Connection Failed
        die(mysqli_error($con));
    }
?>