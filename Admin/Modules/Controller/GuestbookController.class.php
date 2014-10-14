<?php

namespace Modules\Controller;

/**
 * Description of LinkController
 *
 * @author Administrator
 */
class GuestbookController extends \Auth\Controller\AuthbaseController {

    public function index() {
        $gb = DD('Guestbook');
        $result = $gb->guestlist();
        $this->assign('result', $result);
        $this->display();
    }

    public function del() {
        $data = I('get.');
        $gb = DD('Guestbook');
        $result = $gb->del($data['id']);
        $this->redirect('index');
    }
}
