<?php

function TestWrite($d)
{
    $tfile = '_test.txt';
    $d = preg_replace("#\/$#", '', $d);
    $fp = @fopen($d . '/' . $tfile, 'w');
    if (!$fp)
        return false;
    else
    {
        fclose($fp);
        $rs = @unlink($d . '/' . $tfile);
        if ($rs)
            return true;
        else
            return false;
    }
}
