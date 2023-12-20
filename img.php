<?php
include('./functions/functions.php');
$imagelista = getImage();

echo '<img src="data:image/jpeg;base64,' . $imagelista . '" alt="User Image">';


?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>





    <img height="110px" src="data:image/jpeg;base64," alt="">
</body>

</html> -->