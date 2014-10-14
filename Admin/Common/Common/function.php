<?php

function curl_post($data, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
// 这一句是最主要的
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //timeout on connect add by jobsen
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout on response add by jobsen
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $response;
}

function GetIP()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = "127.0.0.1";
    return $ip;
}

/**
 * 文件夹下所有文件
 * @param string $dir
 */
function getfils($dir)
{
    $filearr = array();
    if (is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            while (($file = readdir($dh)) !== false)
            {
                if ($file != '.' && $file != '..')
                {
                    $filearr[] = $file;
                }
            }
            closedir($dh);
        }
        return $filearr;
    }
}

function delDirAndFile($dirName, $echo = 1, $echotxt = '更新缓存')
{
    if ($handle = opendir("$dirName"))
    {
        while (false !== ( $item = readdir($handle) ))
        {
            if ($item != "." && $item != "..")
            {
                if (is_dir("$dirName/$item"))
                {
                    delDirAndFile("$dirName/$item");
                } else
                {
                    if (unlink("$dirName/$item") && $echo == 1)
                    {
                        echo $echotxt . "： $dirName/$item<br />\n";
                    }
                }
            }
        }
        closedir($handle);
        if (rmdir($dirName) && $echo == 1)
        {
            echo $echotxt . "： $dirName<br />\n";
        }
    }
    return TRUE;
}

function cusMd5($str)
{
    return md5(C('COOKIE_TOKEN') . $str);
}
