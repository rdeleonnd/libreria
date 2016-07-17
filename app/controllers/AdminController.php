<?php

class AdminController extends BaseController {
    
    /**
     * The current layout
     * 
     * @var string
     */
    protected $layout = 'layouts.admin';
 
    /**
     * Logs the admin out.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
    
}