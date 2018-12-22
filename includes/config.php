<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("Asia/Manila");

$con = mysqli_connect("localhost", "root", "", "xamppify");

if (mysqli_connect_errno()) {
    echo "Failed to Connect: " . mysqli_connect_errno();
}
