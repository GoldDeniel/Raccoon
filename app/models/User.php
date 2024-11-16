<?php

class User extends Model
{
    protected $table = 'Users';

    public function verifyUser($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password";
        $user = $this->query($query, ['username' => $username, 'password' => $password]);

        if (!empty($user) && password_verify($password, $user[0]->password)) {
            return $user[0];
        }

        return false;
    }
}