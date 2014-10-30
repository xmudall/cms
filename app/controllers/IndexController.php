<?php
class IndexController extends ApplicationController
{
    public function indexAction() {
        return $this->dispatcher->forward(array(
            'controller' => 'customer',
            'action' => 'index',
        ));
    }

    public function loginAction() {
        if ($this->request->isPost()) {
            $uname = $this->request->getPost('username');
            $psw = $this->request->getPost('password');
            $user = User::getDao()->login($uname, $psw);
            if ($user != false) {
                // login success
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->username);
                return $this->dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'index',
                ));
            } else {
                return $this->errorResponse(40002, 'Wrong username or password');
            }
        }
    }

    public function logoutAction() {
        $this->_unRegisterSession();
        $this->view->user = null;
        return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'login',
        ));
    }

    public function testAction() {
        $customer = new Customer();
        if ($customer->save(array(
            // "name" => "testName",
            "phone" => true,
        ))) {
            echo $customer->phone;
        } else {
            foreach ($customer->getMessages() as $message) {
                echo $message->getMessage();
            }
        }
    }

    private function _unRegisterSession() {
        error_log('unregister: ' . json_encode($this->session->get('user')));
        $this->session->remove('user');
        $this->session->destroy();
        error_log('unregister: ' . json_encode($this->session->get('user')));
    }

    private function _registerSession($user) {
        $this->session->set('user', (Object) array(
            'id' => $user->id,
            'username' => $user->username,
            'password' => $user->password,
        ));
        error_log('register: ' . json_encode($this->session->get('user')));
    }

}
