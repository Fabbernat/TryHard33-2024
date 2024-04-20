<?php
function save_users(string $path, array $data): void
{
    $users = load_users($path);

    $users["users"][] = $data;

    $json_data = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    file_put_contents($path, $json_data);
}

function load_users(string $path): ?array
{
    if (!file_exists($path)) {
        $error_message = "Nem sikerült a fájl megnyitása!";
        $query_string = http_build_query(array('error' => $error_message));
        header("Location:index.php?$query_string");
        exit();
    }

    $json = file_get_contents($path);
    $data = json_decode($json, true);

    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        return null;
    }

    return $data;

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