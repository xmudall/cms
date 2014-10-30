<?php
/*
 * Controller 的公共父类，提供一些通用的功能，例如处理异常，返回错误信息等
 * Author: Udall
 *
 */

class ApplicationController extends \Phalcon\Mvc\Controller
{
    public function initialize() {
        $this->view->baseUrl = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$this->url->getBaseUri();
        $this->view->user = $this->session->get('user');
        $this->view->menu = $this->getMenu();
    }

    protected function errorResponse($errcode, $errmsg="") {
        $arr = array(
            'errcode' => $errcode,
            'errmsg' => $errmsg,
        );
        $res = new \Phalcon\Http\Response();
        $res->setContentType("application/json");
        $res->setContent(json_encode($arr));
        return $res;
    }    

    protected function returnJson($jsonObj) {
        $resp = new \Phalcon\Http\Response();
        $resp->setContentType("application/json");
        $resp->setContent(json_encode($jsonObj));
        return $resp;
    }

    private function getMenu() {
        return array(
            (Object) array(
                'name' => 'Customer',
                'href' => 'customer',
            ),
            (Object) array(
                'name' => 'Goods',
                'href' => 'good',
            ),
            (Object) array(
                'name' => 'Order',
                'href' => 'order',
            ),
            // (Object) array(
            //     'name' => 'Customer',
            //     'href' => 'customer',
            // ),
            // (Object) array(
            //     'name' => 'Customer',
            //     'href' => 'customer',
            // ),
        );
    }

    protected function is_unsigned_integer($val) {
        $val=str_replace(" ","",trim($val));
        return eregi("^([0-9])+$",$val);
    }
}
