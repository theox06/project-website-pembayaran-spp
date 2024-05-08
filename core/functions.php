<?php

include '../core/Url.php';
include '../core/Controller.php';
include '../core/BaseModel.php';
include '../dompdf/autoload.inc.php';
$url = new Url;
$db = new BaseModel;

function getTitle()
{
    global $url;
    $title = $url->getUrl();
    if (count($title) === 3) {
        $title = $title[2] . ' ' . $title[0];
    } elseif (count($title) === 2) {
        $title = $title[1] . ' ' . $title[0];
    } else {
        $title = $title[0];
    }

    return ucfirst($title);

}

function urlTo($to)
{
    return 'http://localhost/project_pkl_1' . $to;
}

function checkIsNotLogin()
{
    if (!isset($_SESSION['login'])) {
        header("Location:http://localhost/project_pkl_1/login");
    }
}

function createCookie($username)
{
    global $db;
    $remember = hash('sha256', $data['username']);
    $db->mysqli->query("UPDATE users SET remember_token = '$remember' WHERE username = '$username'");
    setcookie('key', $remember, time() + 3600 * 24, '/');
}

function checkIsLogin()
{
    global $db;
    if (isset($_COOKIE['key'])) {
        $remember = $_COOKIE['key'];
        $result = $db->mysqli->query("SELECT * FROM users WHERE remember_token = '$remember'");
        $data = mysqli_fetch_assoc($result);

        if (!empty($result)) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
        }
    }
}

function deleteCookie($username)
{
    global $db;
    $remember = hash('sha256', $data['username']);
    $db->mysqli->query("UPDATE users SET remember_token = '' WHERE username = '$username'");
    setcookie('key', '', time() - 3600 * 24, '/');
}

function redirectTo($icon, $pesan, $tujuan)
{
    setcookie('alert', serialize([$icon, $pesan]), time() + 1, '/');
    header("Location:http://localhost/project_pkl_1" . $tujuan);
}

function menuActive($menu)
{
    global $url;
    $m = $url->getUrl();
    foreach ($menu as $key) {
        if ($m[0] == $key) {
            return 'active';
        }
    }
}

function menuOpen($menu)
{
    global $url;
    $m = $url->getUrl();
    foreach ($menu as $key) {
        if ($m[0] == $key) {
            return 'menu-open';
        }
    }
}

function usernameCheck($username)
{
    global $db;

    $result = $db->mysqli->query("SELECT * FROM users WHERE username = '$username'");

    return $result->num_rows;
}

function cekNisn($type, $value, $not = null)
{
    global $db;
    $result = $db->mysqli->query("SELECT * FROM siswa WHERE $not $type = '$value'");

    return $result->fetch_assoc();
}

function cekpembayaran($id_siswa, $id_spp)
{
    global $db;
    $result = $db->mysqli->query("SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.id_siswa = siswa.id_siswa WHERE pembayaran.id_siswa = $id_siswa AND pembayaran.id_spp = $id_spp ");

    return $result->fetch_assoc();
}

function getProfil()
{
    global $db;
    $result = $db->mysqli->query("SELECT * FROM users WHERE id_users = ".$_SESSION['id_users']);

    return $result->fetch_assoc();
}

function hitung($table)
{
    global $db;
    $result = $db->mysqli->query("SELECT * FROM " . $table);

    return $result->num_rows;
}

// function cekPembayaran($id_siswa, $id_spp)
// {
//     global $db;
//     $result = $db->mysqli->query("SELECT * FROM pembayaran INNER JOIN siswa ON pembayaran.id_siswa = siswa.id_siswa WHERE pembayaran.id_siswa = $id_siswa AND pembayaran.id_spp = $id_spp ");

//     return $result->fetch_assoc();
// }