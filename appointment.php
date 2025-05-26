<?php
// require 'config.php';

// $user = $_SESSION['user'] ?? null;
// if (!$user || $user['role'] !== 'patient') {
//     die('Access denied.');
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     global $requests, $appointments;

//     $act = $_POST['action'] ?? '';

//     if ($act === 'book') {
//         $newId = time();
//         $requests[] = [
//             'id'          => $newId,
//             'patient_id'  => $user['id'],
//             'status'      => 'pending'
//         ];
//         save_json(REQUESTS_FILE, $requests);
//     }
//     header('Location: dashboard.php');
//     exit;
// }