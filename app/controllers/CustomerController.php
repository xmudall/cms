<?php
class CustomerController extends ApplicationController
{
    public function indexAction() {
        $this->view->items = Customer::find();
    }

    public function deleteAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $customer = Customer::findFirst($id);
        if ($customer != null) {
            if ($customer->delete() == false) {
                return $this->errorResponse(40002, 'Delete failed');
            } else {
                return $this->returnJson( array('success'=>true) );
            }
        } else {
            return $this->errorResponse(40003, 'The record doesn`t exist');
        }

    }

    public function editAction($id = -1) {
        if ( $id == -1 || !$this->is_unsigned_integer($id)) {
            return $this->errorResponse(40001, 'Invalid id');
        }
        $customer = Customer::findFirst($id);
        if ($customer != null) {
            if ( $this->request->isPost() ) {
                error_log(json_encode($_POST));
                // $customer = new Customer();
                $customer->save($_POST);
                $this->dispatcher->forward(array(
                    "controller" => "customer",
                    "action" => "index",
                ));
            } else {
                $this->view->obj = $customer;
            }
        } else {
            return $this->errorResponse(40003, 'The record doesn`t exist');
        }
    }
}
