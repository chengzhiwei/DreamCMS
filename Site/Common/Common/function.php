<?php

/**
 * 自动生成路由地址
 * @param string $url
 * @param string $arr
 * @param string $module
 */
function ROU($url, $arr) {
    if (!key_exists(C('VAR_LANGUAGE'), $arr)) {
        $nl = nowlang();
        $fl = defaultlang();
        if ($nl['id'] != $fl['id']) {
            $arr[C('VAR_LANGUAGE')] = $nl['lang'];
        }
    }
    ksort($arr);
    $url_parse = explode('/', $url);
    foreach ($url_parse as $key => $u_p) {
        if ($key == 0) {
            continue;
        }
        $true_rul.=$u_p . '/';
    }
    $true_rul = rtrim($true_rul, '/');
    $key_array = array_keys($arr);
    $org_url_group = $true_rul . '_' . implode('_', $key_array);
    $module = $url_parse[0];
    $rou_file = getcwd() . '/Router/Site/' . $module . '.php';
    if (is_file($rou_file)) {
        $router = include $rou_file;
        if (!S($module . '_router')) {
            $rou_handle = array();
            foreach ($router['URL_ROUTE_RULES'] as $key => $rules) {
                preg_match_all('/(.*)(\?|&)(.*)=:(\d)(.*)/U', $rules, $matches);
                $temp_arr = array();
                foreach ($matches[3] as $param) {
                    $temp_arr[] = $param;
                }
                ksort($temp_arr);
                $rules_param_arr = array();
                foreach ($matches[4] as $k => $param) {
                    $rules_param_arr[$param] = $matches[3][$k];
                }
                ksort($rules_param_arr);
                //防止绝对匹配
                $v = $rules . '_';
                if ($matches[1][0]) {
                    $v = $matches[1][0] . '_' . implode('_', $temp_arr);
                }
                $rou_handle[$v] = array(
                    'reg' => $key,
                    'rule' => $rules,
                    'param' => $rules_param_arr,
                );
                S($module . '_router', $rou_handle);
            }
        } else {
            $rou_handle = S($module . '_router');
        }
        if (key_exists($org_url_group, $rou_handle)) {
            $reg_rule = $rou_handle[$org_url_group];
            $rou_text = preg_split("/\((.*)\)/U", $reg_rule['reg']);
            $reg_rule['param'] = array_values($reg_rule['param']); //重建索引
            $rou_url = '';
            foreach ($rou_text as $key => $r_t) {
                if (count($rou_text) - 1 == $key) {
                    $rou_url.=$r_t;
                } else {
                    $rou_url .= $r_t . $arr[$reg_rule['param'][$key]];
                }
            }
        }
    }

    if ($rou_url != '') {
        $rou_url = str_replace(array('\\', '/^', '$/'), '', $rou_url);
        $suffix = '';
        if (C('URL_HTML_SUFFIX')) {
            $suffix = '.' . C('URL_HTML_SUFFIX');
        }
        $bfix = '';
        if (C('DEFAULT_MODULE') != $module) {
            $bfix = $module . '/';
        }
        if (C('URL_MODEL') == 0) {
            return __APP__ . '/' . $bfix . $rou_url . $suffix;
        } else {
            return __ROOT__ . '/' . $bfix . $rou_url . $suffix;
        }
    }
    return U($url, $arr);
}

/**
 * 默认语言
 * @return type
 */
function defaultlang() {
    $defaultlang = S('defaultlang');
    if (!$defaultlang) {
        $lang = DD('Language');
        $defaultlang = $lang->findbydefault();
        S('defaultlang', $defaultlang);
    }
    return $defaultlang;
}

/**
 * 当前语言
 * 返回一唯数组格式
 */
function nowlang() {
    $lang = I('get.l', '');
    if ($lang == '') {
        return defaultlang();
    }

    $langlist = langlist();
    foreach ($langlist as $key => $l) {
        if ($l['lang'] == $lang) {
            return $l;
        }
    }
    return defaultlang();
}

/* 语言列表带连接 */

function langlist() {
    if (!S('lang')) {
        $langmod = DD('Language');
        $lang = $langmod->lanlist();
        foreach ($lang as $key => $l) {
            $l['href'] = ROU('Content/Content/index', array(C('VAR_LANGUAGE') => $l['lang']));
            $lang[$key] = $l;
        }
        S('lang', $lang);
    } else {
        $lang = S('lang');
    }
    return $lang;
}

/**
 * 获取用户供应产品自定义分类
 */
function getsupplycate() {
    $data = array();
    $data['cmsdomain'] = 'http://' . $_SERVER['HTTP_HOST'];
    $res = curl_post($data, rtrim(C('API_PATH'), '/') . '/?s=User/Index/index&api=UserBos.selpuidbycmsdomain');
    $arr = json_decode($res, TRUE);
    $data_c = array();
    $data_c['parentuid'] = $arr['api_result']['puid'];
    $result = curl_post($data_c, rtrim(C('API_PATH'), '/') . '/?s=Supply/Index/index&api=UserProcateBos.getuserprocate');
    $array = json_decode($result, TRUE);
    return $array;
}

function curl_post($data, $url) {
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
