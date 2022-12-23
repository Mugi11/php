<?php

define('JSON_PATH', 'Users.json');

function addUser(): void
{
    $usersArray = getArrayFromJson();
    if (count($usersArray["users"]) === 0) {
        $newId = 1;
    } else {
        $newId = $usersArray["users"][count($usersArray["users"]) - 1]["id"] + 1;
    }
    $usersArray["users"][] = getUserFromConsole($newId);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}
function editUser(): void
{
    $usersArray = getArrayFromJson();
    $inputUserId = readline("Введите id чтобы изменить пользователя: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if (!$userKey) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    $usersArray["users"][$userKey] = getUserFromConsole($inputUserId);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}
function deleteUser(): void
{
    $usersArray = getArrayFromJson();
    $inputUserId = readline("Введите id чтобы удалить пользователя: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if ($userKey === null) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    array_splice($usersArray["users"], $userKey, 1);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}
function getArrayFromJson(): array
{
    checkFile();
    $jsonString = file_get_contents(JSON_PATH);
    return json_decode($jsonString, true);
}
function printInterface(): void
{
    echo PHP_EOL; 
    echo "Введите 1, чтобы завершить", PHP_EOL;
    echo "Введите 2, чтобы добавить", PHP_EOL;
    echo "Введите 3, чтобы изменить", PHP_EOL;
    echo "Введите 4, чтобы удалить", PHP_EOL;
    echo PHP_EOL;
}
function findUserKey($usersArray, int $findId): ?int
{
    for ($i = 0; $i < count($usersArray["users"]); $i++) {

        $keyOfUser = array_search($findId, $usersArray["users"][$i]);
        if ($keyOfUser !== false) {
            return $i;
        }
    }
    return null;
}
function getUserFromConsole(int $id): array
{
    $login = readline('Введите login: ');
    $password = readline('Введите password: ');
    $name = readline('Введите name: ');
    $newUser = array(
        "id" => $id,
        "login" => $login,
        "password" => $password,
        "name" => $name
    );
    return $newUser;
}
function checkFile(): void
{
    if (!file_exists(JSON_PATH)){
        fopen(JSON_PATH, "w");
        $jsonTemplate = '{"users": []}';
        file_put_contents(JSON_PATH, $jsonTemplate);
    }
}
while (true) {
    printInterface();
    $inputAction = readline();
    if ($inputAction === "2") {
        addUser();
    } elseif ($inputAction === "3") {
        editUser();
    } elseif ($inputAction === "4") {
        deleteUser();
    } elseif ($inputAction === "1") {
        return;
    }
}
