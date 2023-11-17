<?php
$user_form = [
    "ID" => ["input_type"=>"hidden", "is_required"=>false],
    "first_name" => [],
    "last_name" => [],
    "email" => ["input_type"=>"email"],
    "phone_number" => ["input_type"=>"number"],
    "gender" => ["placeholder" => "Select your gender", "is_required" => true, "options" => ["Male" => "Male", "Female" => "Female"], "type" => "select"],
    "password" => ["input_type"=>"password"],
    "confrim_password" => ["input_type"=>"password"],
    "Referral_code" => ["placeholder" => "UX920", "is_required" => false,],  
    // "input_data" => ["full_name" => "seriki gbenga", "gender"=>"Male"],
];

$access_form = [
    "username" => [
        "title" => "Username",
        "global_class" => "col-md-12",
        // "id" => "user-password",
        "name"=> "username",
        "class" => "form-control",
        "placeholder" => "Enter Username",
        "is_required" => true,
        "input_type" => "text",
        "type" => "input"
        
    ],

    "password" => [
        "title" => "Password",
        "global_class" => "col-md-12",
        "id" => "user-password",
        "name"=> "password",
        "class" => "",
        "placeholder" => "Enter Password",
        "is_required" => true,
        "input_type" => "password",
        "type" => "input"
    ],
];
