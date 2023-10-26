<?php
$url = "https://646b538d7d3c1cae4ce3a0b1.mockapi.io/api/v1/user";
$curl = curl_init($url);

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1
]);

$res = curl_exec($curl);
$output = "";
foreach (json_decode($res, true) as $user) {
    $output .= "
    <div class='card m-2 p-2' id='{$user['id']}'>
        <img src='{$user['avatar']}' class='card-img-top' alt='profile image'>
        <div class='card-body'>
            <h6 class='card-title'>{$user['name']}</h6>
            <p class='card-text fs-6 text-secondary'>Create at: " . date("d/m/y", strtotime($user['createdAt'])) . "</p>
        </div>
        <duv class='btn-group'>
            <button class='btn btn-success w-100 btn-sm mx-1' onclick='updateUser({$user['id']})'>Update</button>
            <button class='btn btn-danger w-100 btn-sm mx-1' onclick='deleteUser({$user['id']})'>Delete</button>
        </div>
    </div>
    ";
}
echo $output;
