<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\Adomodel;

/**
 * Description of AdTypeModel
 *
 * @author Panxin <americapan@vip.qq.com>
 * @date 2014-9-4 13:58:17
 */
class AdTypeModel extends \Think\Model\AdvModel {

    public function typelist($langid) {
        $condition=array();
        $condition['langid']=$langid;
        return $this->where($condition)->select();
    }

    public function addtype($data = array()) {
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

    public function selbytitle($title) {
        $condition = array();
        $condition['title'] = $title;
        return $this->where($condition)->find();
    }

    public function selbyid($id) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function deltype($id) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    public function updatetype($id, $data) {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->save($data);
    }

}
