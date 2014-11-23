<?php
class GoodController extends ApplicationController
{
    public function indexAction() {
        $this->view->items = Good::find();
        $this->view->rate = $this->config->base->rate;
    }

    public function deleteAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $good = Good::findFirst($id);
        if ($good != null) {
            if ($good->delete() == false) {
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
            $good = new Good();
            $good->save($_POST);
            $this->dispatcher->forward(array(
                "controller" => "good",
                "action" => "index",
            ));
        }
    }

    public function editAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $good = Good::findFirst($id);
        if ($good != null) {
            if ( $this->request->isPost() ) {
                error_log(json_encode($_POST));
                $good->save($_POST);
                $this->dispatcher->forward(array(
                    "controller" => "good",
                    "action" => "index",
                ));
            } else {
                $this->view->obj = $good;
            }
        } else {
            return $this->errorResponse(40003, 'The record doesn`t exist');
        }
    }
}
