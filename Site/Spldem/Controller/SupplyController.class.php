<?php

namespace Spldem\Controller;

class SupplyController extends \Common\Controller\SiteController {

    public function supplylist() {
        $array = getsupplycate();
        $api_status = $array['api_result'];
        if (!empty($api_status)) {
            $this->assign('supplylist', $api_status);
        } else {
            $this->error('暂无数据');
        }
        $this->display();
    }

    public function info() {
        $data = array();
        $data['typeid'] = I('get.id');
        $data['puid'] = I('get.puid');
        $result = curl_post($data, rtrim(C('API_PATH'), '/') . '/?s=Supply/Index/index&api=SupplyBom.selbyusertypeid');
        $arr = json_decode($result, TRUE);
//        echo "<pre>";
//      print_r($arr);
        $this->assign('info',$arr['api_result']);
        $this->display();
    }

}
