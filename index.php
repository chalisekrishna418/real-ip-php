<?php
// Get the requester's IP address
function getUserIP() {
    // Check if IP is passed from shared internet or a proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check if the IP is passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Default to REMOTE_ADDR if no proxy headers are present
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Get the IP address
$userIP = getUserIP();

// Return the IP address as a response
header('Content-Type: application/json');
echo json_encode(['ip' => $userIP]);
?>