<?php class users extends database {
    function create_user($data){
        $info = $this->validate_form($data, "users", "insert");
        if(!is_array($info)){
            return ;
        }
        // $this->quick_insert("users", $info, "User created successfully");
    }
}