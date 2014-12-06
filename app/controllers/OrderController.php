<?php
class OrderController extends ApplicationController
{
    public function indexAction() {
        $this->view->items = Order::find();
        $this->view->rate = $this->config->base->rate;
    }

    public function deleteAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $order = Order::findFirst($id);
        if ($order != null) {
            if ($order->delete() == false) {
                return $this->errorResponse(40002, 'Delete failed');
            } else {
                return $this->returnJson( array('success'=>true) );
            }
        } else {
            return $this->errorResponse(40003, 'The record doesn`t exist');
        }

    }

    public function newAction() {
        if ( $this->request->isPost() ) {
            $order = new Order();
            $order->save($_POST);
            $this->dispatcher->forward(array(
                "controller" => "order",
                "action" => "index",
            ));
        }
    }

    public function editAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $order = Order::findFirst($id);
        if ($order != null) {
            if ( $this->request->isPost() ) {
                error_log(json_encode($_POST));
                $order->save($_POST);
                $this->dispatcher->forward(array(
                    "controller" => "order",
                    "action" => "index",
                ));
            } else {
                $this->view->obj = $order;
            }
        } else {
            return $this->errorResponse(40003, 'The record doesn`t exist');
        }
    }
}
