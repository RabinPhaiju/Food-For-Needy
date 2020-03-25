<?php

// Create connection
$conn = mysqli_connect("localhost", "root","","ffn");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}