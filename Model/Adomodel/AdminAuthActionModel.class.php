<?php

namespace Model\Adomodel;

class AdminAuthActionModel extends \Think\Model\AdvModel
{

    public function selbycid($cid, $isshow = '')
    {
        $condition = array();
        $condition['cid'] = $cid;
        if ($isshow != '')
        {
            $condition['isshow'] = $isshow;
        }
        return $this->where($condition)->select();
    }

    public function selbygid($gid, $isshow = '')
    {
        $condition = array();
        $condition['gid'] = $gid;
        if ($isshow != '')
        {
            $condition['isshow'] = $isshow;
        }
        return $this->where($condition)->select();
    }

    /**
     * 根据分组模块和操作名查询
     * @param string $group
     * @param string $module
     * @param string $action
     */
    public function findbyGMA($module, $controller, $action)
    {
        $condition = array();
        $condition = array(
            'group' => $module,
            'controller' => $controller,
            'action' => $action,
        );
        return $this->cache(TRUE)->where($condition)->find();
    }

    public function addAction($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {

            if ($this->add())
            {
                return true;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function delAction($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    public function findByID($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function edit($id, $data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            $condition = array('id' => $id);
            if ($this->where($condition)->save())
            {
                return true;
            }
        }

        return false;
    }

    /**
     * 删除插件ACTION
     * @param string $group 分组模块名
     */
    public function delPlgByGroup($group)
    {
        $condition = array(
            'app' => \Model\Enum\AppEnum::PLUGIN, //1 为插件
            'group' => $group,
        );
        return $this->where($condition)->delete();
    }

    /**
     * 根据分组模块名查询插件ACTIONS
     * @param string $group 分组模块名
     */
    public function selPlgByGroup($group)
    {
        $condition = array(
            'app' => \Model\Enum\AppEnum::PLUGIN,
            'group' => $group,
        );
        return $this->where($condition)->select();
    }

}
