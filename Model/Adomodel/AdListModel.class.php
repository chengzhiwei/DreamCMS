<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\Adomodel;

/**
 * Description of AdListModel
 *
 * @author Panxin <americapan@vip.qq.com>
 * @date 2014-9-4 16:03:42
 */
class AdListModel extends \Think\Model\AdvModel {

    public function adlist($langid) {
        $condition = array();
        $condition['langid'] = $langid;
        return $this->where($condition)->order('id desc')->select();
    }

    public function addad($data = array()) {
        if ($this->create($data)) {
            if ($this->add()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function selbytid($tid) {
        $condition = array();
        $condition['tid'] = $tid;
        return $this->where($condition)->count();
    }

    public function selbyid($id) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function delad($id) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }
    
     public function updatetype($id, $data) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->save($data);
    }
    
    public function selbytitle($title){
        $condition = array();
        $condition['title'] = $title;
        return $this->where($condition)->find();
    }

}
