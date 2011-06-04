<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_User extends Controller_TextuTemplate {
 
    public function action_index()
    {
        $this->template->content = View::factory('user/info')
            ->bind('user', $user);
         
        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
            Request::current()->redirect('user/login');
        }
    }
 
    public function action_create() 
    {
        $this->template->content = View::factory('user/create')
            ->bind('errors', $errors)
            ->bind('message', $message);
             
        if ($_POST) 
        {           
            try {
         
                // Create the user using form values
                $user = ORM::factory('user')->create_user($_POST, array(
                    'username',
                    'password',
                    'email'            
                ));
                 
                // Grant user login role
                $user->add('roles', ORM::factory('role', array('name' => 'login')));
                 
                // Reset values so form is not sticky
                $_POST = array();
                 
                // Set success message
                $message = " New user '{$user->username}' successfully created.";
                 
            } catch (ORM_Validation_Exception $e) {
                 
                // Set failure message
                $message = 'There were errors, please see form below.';
                 
				// var_dump($e->errors());
				
                // Set errors using custom messages
                $errors = $e->errors('models');
            }
        }
    }
     
    public function action_login() 
    {
        $this->template->content = View::factory('user/login')
            ->bind('errors', $errors)
            ->bind('message', $message);
             
        if ($_POST) 
        {
            // Attempt to login user
            $remember = array_key_exists('remember', $_POST);
            $user = Auth::instance()->login($_POST['username'], $_POST['password'], $remember);
             
            // If successful, redirect user
            if ($user) 
            {
                Request::current()->redirect('user/index');
            } 
            else
            {
                $message = 'Login failed';
            }
        }
    }
     
    public function action_logout() 
    {
        // Log user out
        Auth::instance()->logout();
         
        // Redirect to login page
        Request::current()->redirect('user/login');
    }
 
}