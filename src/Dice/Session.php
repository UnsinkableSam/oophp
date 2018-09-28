<?php


namespace sapt17\Dice;

class Session
{


    public static function start()
    {
        session_start();
    }

    public static function set(string $name, $class)
    {
        $_SESSION[$name] = $class;
    }


    public static function destroy()
    {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

    // Finally, destroy the session.
        session_destroy();
    }
}
