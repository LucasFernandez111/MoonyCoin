<?php

include('C:\xampp\htdocs\moonpag\config.php');


function getCookie()
{
    if(!isset($_COOKIE['dataUser'])){
        return ;
    }
    $data = unserialize($_COOKIE['dataUser']);
    $id = $data['id'];
    $user = $data['user'];



    return [
        'id' => $id, 'user' => $user];

}



function uploadAndSaveImage($imageTmpName)
{
    global $link;
    $imageSize = filesize($imageTmpName);

    ['id' => $id] = getCookie();


    if ($imageSize > 0) {

        $imageData = file_get_contents($imageTmpName);


        $escapedImageData = $link->real_escape_string($imageData);


        $sql = "UPDATE users SET image = '$escapedImageData' WHERE id = $id";


        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error updating record: " . $link->error;
        }


        $link->close();
    } else {
        echo "Please select an image.";
    }
}




function getImage()
{
    global $link;
    ['id' => $id] = getCookie();
    $sql = "SELECT image FROM users WHERE id = '$id'";

    $result = mysqli_query($link, $sql);


    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $imageData = $row['image'];

            $imageBase64 = base64_encode($imageData);


        } else {
            echo "No rows found for user ID: $id";
        }
    }
    return $imageBase64;

}


