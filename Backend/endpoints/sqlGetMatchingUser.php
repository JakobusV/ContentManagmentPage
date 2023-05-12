<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("userEmail", $data) && array_key_exists("userPassword", $data)) {
    $dbConnection = DBConnection();
    $userEmail = $data["userEmail"];
    $userPassword = $data["userPassword"];
    $user = new user();

    $query = $user->SelectQuery($columns = array(), $filters = array($user->CreateFilterExact("email", $userEmail), $user->CreateFilterExact("password", $userPassword)));
    $dataSet = @mysqli_query($dbConnection, $query);

    if ($dataSet) {
        $rowArray;
        while ($row = @mysqli_fetch_array($dataSet)) {
            $rowArray[] = json_decode($row[0]);
        }
        $json = json_encode($rowArray);
    }
    @mysqli_close($dbConnection);

    if ($json == "null") {
        $json = "No Matching Users";
    }
}
echo $json;
?>