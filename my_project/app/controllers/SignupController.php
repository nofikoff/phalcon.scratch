<?php
declare(strict_types=1);

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    }

    public function registerAction()
    {
        $post = $this->request->getPost();

        $user = new Users();
        $user->name = $post['name'];
        $user->email = $post['email'];

        // Store and check for errors
        $success = $user->save();
        if ($success) {
            echo "Thanks you for signing up!";
        } else {
            echo "Oops, seems like the following issues were encountered: ";
            $messages = $user->getMessages();
            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        $this->view->disable();
    }

}

