<?php
function save_users(string $path, array $data): void
{
    $users = load_users($path);

    $users["users"][] = $data;

    $json_data = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    file_put_contents($path, $json_data);
}

function load_users(string $path): array
{
    if (!file_exists($path))
        die("Nem sikerült a fájl megnyitása!");

    $json = file_get_contents($path);

    return json_decode($json, true);
}

function getUserProgress(string $user_id): array
{
    $users = load_users("../json/users.json");

    foreach ($users["users"] as $user) {
        if ($user["username"] === $user_id) {
            return $user["solved_tasks"];
        }
    }

    return [];
}