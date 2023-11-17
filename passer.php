<?php
if (isset($_POST['adminAcess'])) {
    require_once "include/auth-ini.php";
    // $loadpass = "Example123#!";
    // $admincheck2 = password_hash($loadpass, PASSWORD_BCRYPT);
    // echo $admincheck2;
    echo $v->signin($access_form);
    return null;
}

require_once "inis/ini.php";
require_once "function/users.php";
$u = new users;
if (isset($_POST['create_account'])) {
    echo $u->create_user($users_form);
}



// Search Key
if (isset($_POST['searchkey'])) {
    $key  = htmlspecialchars($_POST['searchkey']);
    $data = $d->getall("products", "title like '%$key%' or content like '%$key%'", fetch: "moredetails");
    if ($data != "") {
        foreach ($data as $row) {
            $user_id = $row['userID'];
            echo "<a href='view-user.php?pID=$user_id'>";
            $img_src = $row['img'];
            echo "<img  style='width:25%' src='pages/shop/images/$img_src' alt='img'><br>";
            echo $row['title'] . "<br>";
            echo $row['userID'] . "<br />" . "<hr />";
            echo '</a>';
        }
    } else {
        echo "No user found with the key " . $key;
    }
}
?>

