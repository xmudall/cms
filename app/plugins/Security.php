<?php

use Phalcon\Events\Event,
        Phalcon\Mvc\User\Plugin,
        Phalcon\Mvc\Dispatcher;

class Security extends Plugin
{
    public function beforeDispatch(Event $event, Dispatcher $dispatcher) {
        $user = $this->session->get('user');
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        if ( !$user && ($controller != 'index' || $action != 'login') ) {
        error_log('Guest! Redirect to login! ' . $controller . '/' . $action . '@' . json_encode($user));
            $this->flash->error("You don't have access to this module");
            $dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'login',
            ));
        } else if ( $user && $controller == 'index' && $action == 'login' ) {
        error_log('Logged! Redirect to home! ' . $controller . '/' . $action . '@' . json_encode($user));
            $this->flash->error("You have already logged in");
            $dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'index',
            ));
        }
    }

}
