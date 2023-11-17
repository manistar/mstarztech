<?php
session_start();
define("Regex", []);
require_once "include/session.php";
require_once "include/database.php";
require_once "content/content.php";

$c = new content;
$d = new database;

$page = "dashboard";
if (isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
}

$users_form = [
    "ID" => ["unique" => "", "input_type" => "hidden"],
    "full_name" => [
        "title" => "Enter full name",
        "id" => "my_full_name_id",
        "class" => "add this class",
        "placeholder" => "Enter your full name",
        "description" => "Enter both first name and last name",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input",
    ],
    "email" => ["input_type" => "email", "unique" => ""],
    "gender" => ["placeholder" => "Select your gender", "is_required" => true, "options" => ["Male" => "Male", "Female" => "Female"], "type" => "select"],
    "tell_us_more" => ["placeholder" => "Tell us more about your self", "is_required" => false, "type" => "textarea",],
    "input_data" => ["ID" => uniqid()],
];

// $d->create_table("users", $users_form);

$userID          = htmlspecialchars($_SESSION['adminSession']);
$adminID         = $userID;
$GetAdminProfile = $d->getall("admin", "ID = ?", [$adminID], fetch: "details");
$product_data    = $d->getall("products", fetch: "moredetails");


// var_dump($product_data->rowCount());

if (isset($_GET['ID'])) {
    $product_id     = $_GET['ID'];
    $product_detail = $d->getall("products", "ID = ?", [$product_id], fetch: "details");
}
