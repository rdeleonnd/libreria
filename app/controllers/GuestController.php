<?php
class GuestController extends BaseController {
    
    /**
     * The current layout
     * 
     * @var string
     */
    protected $layout = 'layouts.guest';
      
    /**
     * Logs the user into the admin panel.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if (Request::isMethod('get'))
        {
            $this->layout->content = View::make('guest.login');
        }        
        else if (Request::isMethod('post'))
        {          
            if (Auth::attempt(array('login' => Input::get('login'), 'password' => Input::get('password'))))
            {                                 
                return Redirect::to('book/index');
            }
            else
            {
                return Redirect::to('admin/login')->withInput();
            }
        }
    }
    
}