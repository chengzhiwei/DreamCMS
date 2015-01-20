<?php

/**
 * 自动生成路由地址
 * @param string $url
 * @param string $arr
 * @param string $module
 */
function ROU($url, $arr)
{
    if (C('URL_MODEL') != 2)
    {
        return U($url, $arr);
    }
    if (!key_exists(C('VAR_LANGUAGE'), $arr))
    {
        $nl = nowlang();
        $fl = defaultlang();
        if ($nl['id'] != $fl['id'])
        {
            $arr[C('VAR_LANGUAGE')] = $nl['lang'];
        }
    }
    ksort($arr);
    $url_parse = explode('/', $url);
    foreach ($url_parse as $key => $u_p)
    {
        if ($key == 0)
        {
            continue;
        }
        $true_rul.=$u_p . '/';
    }
    $true_rul = rtrim($true_rul, '/');
    $key_array = array_keys($arr);
    $org_url_group = $true_rul . '_' . implode('_', $key_array);
    $param_str = '';
    foreach ($arr as $key => $a)
    {
        $param_str.=$key . '=' . $a . '&';
    }
    $C_org_url_group = $true_rul . '?' . rtrim($param_str, '&');
    $module = $url_parse[0];
    $rou_file = getcwd() . '/Config/Router/Site/' . $module . '.php';
    if (is_file($rou_file))
    {
        $router = include $rou_file;

        if (!S($module . '_router'))
        {
            $rou_handle = array();
            foreach ($router['URL_ROUTE_RULES'] as $key => $rules)
            {
                preg_match_all('/(.*)(\?|&)(.*)=:(\d)(.*)/U', $rules, $matches);
                if (!$matches[3])
                {
                    //$rules = str_replace(array('?', '='), '/', $rules);
                }
                $temp_arr = array();
                foreach ($matches[3] as $param)
                {
                    $temp_arr[] = $param;
                }
                ksort($temp_arr);
                $rules_param_arr = array();
                foreach ($matches[4] as $k => $param)
                {
                    $rules_param_arr[$param] = $matches[3][$k];
                }
                ksort($rules_param_arr);
                //防止绝对匹配
                $v = $rules . '_';
                if ($matches[1][0])
                {
                    $v = $matches[1][0] . '_' . implode('_', $temp_arr);
                }
                $v = rtrim($v, '_');
                $rou_handle[$v] = array(
                    'reg' => $key,
                    'rule' => $rules,
                    'param' => $rules_param_arr,
                );
                S($module . '_router', $rou_handle);
            }
        } else
        {
            $rou_handle = S($module . '_router');
        }

        $rou_handle_key = array_keys($rou_handle);


        $index1 = -1;
        if (in_array($org_url_group, $rou_handle_key))
        {
            $index1 = array_search($org_url_group, $rou_handle_key);
        }
        $index2 = -1;
        if (in_array($C_org_url_group, $rou_handle_key))
        {
            $index2 = array_search($C_org_url_group, $rou_handle_key);
        }
        if (($index1 == -1 && $index2 != -1) || ($index1 > $index2 && $index1 != -1 && $index2 != -1 ))
        {

            $org_url_group = $C_org_url_group;
        }

        if (key_exists($org_url_group, $rou_handle))
        {
            $reg_rule = $rou_handle[$org_url_group];
            $rou_text = preg_split("/\((.*)\)/U", $reg_rule['reg']);
            $reg_rule['param'] = array_values($reg_rule['param']); //重建索引
            $rou_url = '';
            foreach ($rou_text as $key => $r_t)
            {
                if (count($rou_text) - 1 == $key)
                {
                    $rou_url.=$r_t;
                } else
                {
                    $rou_url .= $r_t . $arr[$reg_rule['param'][$key]];
                }
            }
        }
    }

    if ($rou_url != '')
    {
        $rou_url = str_replace(array('\\', '/^', '$/'), '', $rou_url);
        $suffix = '';
        if (C('URL_HTML_SUFFIX'))
        {
            $suffix = '.' . C('URL_HTML_SUFFIX');
        }
        $bfix = '';
        if (C('DEFAULT_MODULE') != $module)
        {
            $bfix = $module . '/';
        }
        if (C('URL_MODEL') == 0)
        {
            return __APP__ . '/' . $bfix . $rou_url . $suffix;
        } else
        {
            return __ROOT__ . '/' . $bfix . $rou_url . $suffix;
        }
    }
    return U($url, $arr);
}

/* 语言列表带连接 */

function langlist()
{
    if (!S('lang'))
    {
        $langmod = DD('Language');
        $lang = $langmod->lanlist();
        foreach ($lang as $key => $l)
        {
            $l['href'] = ROU('Content/Content/index', array(C('VAR_LANGUAGE') => $l['lang']));
            $lang[$key] = $l;
        }
        S('lang', $lang);
    } else
    {
        $lang = S('lang');
    }
    return $lang;
}

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

//父级栏目
function parentcate($cid = '')
{
    if (!$cid)
    {
        $cid = I('get.cid');
    }
    $c_mod = DD('Category');
    $parent_info = $c_mod->selectF($cid);
    foreach ($parent_info as $k => $v)
    {
        if ($v['type'] == 1)
        {
            $v['href'] = $v['link'];
        } else
        {
            if ($v['mid'] == 3)//单页面模型
            {
                $v['href'] = ROU('Content/Content/page', array('cid' => $v['id']));
            } else
            {
                if ($v['isleaf'] == 1)//子级调用list
                {
                    $v['href'] = ROU('Content/Content/newslist', array('cid' => $v['id']));
                } else //父级调用CATEGORY
                {
                    $v['href'] = ROU('Content/Content/category', array('cid' => $v['id']));
                }
            }
        }
        $parent_info[$k] = $v;
    }
    return $parent_info;
}

function childcate($cid = '')
{
    if (!$cid)
    {
        $cid = I('get.cid');
    }
    $c_mod = DD('Category');
    $chind_info = $c_mod->selectS($cid);
    foreach ($chind_info as $k => $v)
    {
        if ($v['type'] == 1)
        {
            $v['href'] = $v['link'];
        } else
        {
            if ($v['mid'] == 3)//单页面模型
            {
                $v['href'] = ROU('Content/Content/page', array('cid' => $v['id']));
            } else
            {
                if ($v['isleaf'] == 1)//子级调用list
                {
                    $v['href'] = ROU('Content/Content/newslist', array('cid' => $v['id']));
                } else //父级调用CATEGORY
                {
                    $v['href'] = ROU('Content/Content/category', array('cid' => $v['id']));
                }
            }
        }
        $chind_info[$k] = $v;
    }
    return $chind_info;
}

function nowcate($id, $class)
{
    echo "class='" . $class . "'";
}

//所有菜单 只含有显示部分
function allmenu($lid)
{

    if (!S('menu_' . $lid))
    {
        $Category = DD('Category');
        $result = $Category->selectbylang($lid,1);
        foreach ($result as $key => $v)
        {
            if ($v['type'] == 1)
            {
                $v['href'] = $v['link'];
            } else
            {
                if ($v['mid'] == -1)//单页面模型
                {
                    $v['href'] = ROU('Content/Content/page', array('cid' => $v['id']));
                } else
                {
                    if ($v['isleaf'] == 1)//子级调用list
                    {
                        $v['href'] = ROU('Content/Content/newslist', array('cid' => $v['id']));
                    } else //父级调用CATEGORY
                    {
                        $v['href'] = ROU('Content/Content/category', array('cid' => $v['id']));
                    }
                }
            }
            $result[$key] = $v;
        }

        S('menu_' . $lid, $result);
    } else
    {
        $result = S('menu_' . $lid);
    }
    return $result;
}

function build_tree($rows, $root_id)
{
    $childs = findChild($rows, $root_id);
    if (empty($childs))
    {
        return null;
    }
    foreach ($childs as $k => $v)
    {
        $rescurTree = build_tree($rows, $v['id']);
        if (null != $rescurTree)
        {
            $childs[$k]['child'] = $rescurTree;
        }
    }
    return $childs;
}

function findChild(&$arr, $id)
{

    $childs = array();
    foreach ($arr as $k => $v)
    {
        if ($v['pid'] == $id)
        {
            $childs[] = $v;
        }
    }
    return $childs;
}

//获取栏目
function getmenu($pid = 0)
{
    $nowlang = SiteNowLang();
    $lid = $nowlang['id'];
    if (!S('menu_' . $lid . '_' . $pid))
    {
        $res = allmenu($lid);
        $menu = build_tree($res, $pid);
        S('menu_' . $lid . '_' . $pid, $menu);
    } else
    {

        $menu = S('menu_' . $lid . '_' . $pid);
    }

    return $menu;
}

function getchildids($cid)
{
    if (!S('childs_' . $cid))
    {
        $catemod = DD('Category');
        $info = $catemod->selectF($cid);
        $menu = allmenu($info['langid']);
        $cids = deepchildids($menu, $cid) . $cid;
        S('childs_' . $cid, $cids);
        return $cids;
    } else
    {
        return S('childs_' . $cid);
    }
}

function deepchildids($rows, $root_id)
{
    static $childids = '';
    $childs = findChild($rows, $root_id);
    if (empty($childs))
    {
        return null;
    }
    foreach ($childs as $k => $v)
    {
        deepchildids($rows, $v['id']);
        $childids.=$v['id'] . ',';
    }
    return $childids;
}

/**
 * 设置当前选择栏目的样式
 * @param int $id
 * @param string $cls
 */
function setcur($id, $cls = 'cur')
{
    $cid = I('get.cid');
    $crumbs = \Common\Cls\ContentCls::breadcrumbs($cid);
    foreach ($crumbs as $c)
    {
        if ($id == $c['id'])
        {
            echo $cls;
            break;
        }
    }
}

function samechildcate($cid)
{
    $arr = getmenu($cid);
    if (!$arr)
    {
        $catemod = DD('Category');
        $info = $catemod->selectF($cid);
        $arr = getmenu($info['pid']);
    }
    return $arr;
}
