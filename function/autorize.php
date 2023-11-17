<?php
class validate extends database
{
    public function signin($access_form)
    {
        $d    = new database;
        $data = $this->validate_form($access_form);
        if (!is_array($data)) {
            return null;
        }
        $value = $this->getall("admin", "username = ?", [$data['username']], fetch: "details");
        if (is_array($value)) {
            if (password_verify($data['password'], $value['password'])) {
                // $this->updateadmintoken($value['ID'], "admin");
                 $_SESSION['adminSession'] = htmlspecialchars($value['ID']);
                   return $this->loadpage("index.php", "json");
            } else {
                $this->message("Password Incorrect", "error");
            }
        } else {
            $this->message("Username doesn't exist.", "error");
        }
    }
}


?>