<?php

namespace App\Libraries;

class Hash
{
    public static function createHashedPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function comparePassword($password, $db_hashed_password)
    {
        if (password_verify($password, $db_hashed_password)) {
            return true;
        } else {
            return false;
        }
    }
}
