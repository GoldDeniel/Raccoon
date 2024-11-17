<?php

class User extends Model
{
    protected $table = 'Users';

    public function verifyUser($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password";
        $user = $this->query($query, ['username' => $username, 'password' => $password]);

        // if (!empty($user) && password_verify($password, $user[0]->password)) {
        //     return $user[0];
        // }
        if (!empty($user)) {
            return $user[0];
        }

        return false;
    }
    public function registerUser($username, $password, $first_name, $last_name)
    {
        $user = $this->query("SELECT * FROM " . $this->table . " WHERE username = :username", ['username' => $username]);
        
        if (!empty($user)) {
            return false;
        }

        $this->insert(['username' => $username, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name]);
        return true;
        
    }
}