<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

define('USERS_FILE',       __DIR__.'/data/users.json');
define('REQUESTS_FILE',    __DIR__.'/data/requests.json');
define('APPTS_FILE',       __DIR__.'/data/appointments.json');

$users     = json_decode(file_get_contents(USERS_FILE),     true) ?: [];
$requests  = json_decode(file_get_contents(REQUESTS_FILE),  true) ?: [];
$appointments = json_decode(file_get_contents(APPTS_FILE),  true) ?: [];

function save_json(string $file, array $data): void {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

function find_user(string $username): ?array {
    global $users;
    foreach ($users as $u) {
        if ($u['username'] === $username) return $u;
    }
    return null;
}
?>