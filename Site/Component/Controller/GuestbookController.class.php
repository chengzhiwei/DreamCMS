<?php

namespace Component\Controller;

class GuestbookController extends \Common\Controller\SiteController
{

    public function index()
    {
        if (IS_POST)
        {
            $guestbookmod = DD('Guestbook');
            $t = $guestbookmod->addguest();
            if ($t)
            {
                $this->success('留言成功');
            } else
            {
                $this->error('发生错误 '.$guestbookmod->getError());
            }
        } else
        {
            $this->display();
        }
    }

}
