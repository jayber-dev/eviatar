<?php

if (!isset($mysqli)) {
    $mysqli = new mysqli("localhost", "root", "", "store");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

}
