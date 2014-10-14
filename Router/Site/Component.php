<?php
return array(
    'URL_ROUTE_RULES' => array(
        '/^guestbook$/' => 'Guestbook/index',
        '/^guestbook_(.*)$/' => 'Guestbook/index?l=:1',
    ),
);
