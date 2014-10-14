<?php

namespace Model\Adomodel;

class AdminModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('username', 'require', '用户名不能为空'),
        array('pwd', 'require', '密码不能为空'),
    );
    protected $_filter = array(
        'username' => array('htmlspecialchars'),
    );
    protected $_auto = array(
            //array('name','getName',3,'callback')
    );

    public function findById($id)
    {
        return $this->find($id);
    }

    /**
     * 添加管理员
     * @param array $data
     * @return boolean
     */
    public function addadmin($data = array())
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

    public function findbyname($username = '')
    {
        if (!$username)
        {
            $username = I('post.username');
        }
        $condition = array();
        $condition['username'] = $username;
        return $this->where($condition)->find();
    }

    public function alladmin()
    {
        return $this->select();
    }
    
    public function updatepwd($id,$pwd)
    {
        $condition=array();
        $condition['id']=$id;
        $data=array();
        $data['pwd']=$pwd;
        return $this->where($condition)->save($data);
    }
}
