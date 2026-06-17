<?php
require_once __DIR__ . '/Database.php';

class Auth extends Database {
    public function __construct() {
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($username, $password) {
        $username = $this->koneksi->real_escape_string($username);
        $password = $this->koneksi->real_escape_string($password);

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['tipe_user'] = $user['tipe_user'];
            $_SESSION['login'] = true;
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['login']) && $_SESSION['login'] === true;
    }
    
    public function checkAuth() {
        if (!$this->isLoggedIn()) {
            header("Location: index.php");
            exit;
        }
    }
}
?>
