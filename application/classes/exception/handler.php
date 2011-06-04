<?php defined('SYSPATH') or die('No direct script access.');

class Exception_Handler
{
    public static function handle(Exception $e)
    {
        switch (get_class($e))
        {
            case 'Http_Exception_404':
                $response = new Response;
                $response->status(404);
                $view = new View('error_404');
                $view->message = $e->getMessage();
                $view->title = 'File Not Found';
                echo $response->body($view)->send_headers()->body();
                return TRUE;
                break;
            default:
                return Kohana_Exception::handler($e);
                break;
        }
    }
}