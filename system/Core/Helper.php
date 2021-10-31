<?php

class Helper
{
    public static function slug($str = '')
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    public static function json($data = [])
    {
        header('Content-Type: application/json');
        
        echo json_encode($data);
    }
    public static function dd($array = []) 
    {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
        die();
    }
    public static function makeSafe($data = '')
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public static function decodeSafe($data)
    {
        $data = htmlspecialchars_decode($data);
        $data = stripslashes($data);
        return $data;
    }

    public static function redirect($url = '')
    {
        return header('Location: /' . $url);
    }

    public static function flash($key ='', $text = '')
    {
        $_SESSION[$key][] = $text;
    }

    public static function clearFlash($key = '')
    {
        unset($_SESSION[$key]);
    }

    public static function success($text = '')
    {
        $_SESSION["success"][] = $text;
    }
}