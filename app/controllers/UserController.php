<?php
class UserController extends BaseController {
    
    public function __construct()
    {
        $this->beforeFilter('auth');  
        $this->beforeFilter(function(){            
            $this->layout = 'layouts.admin';            
        });
    }
    
    /**
     * Edits the given user.
     * 
     * @return Illuminate\Http\RedirectResponse
     */    
    public function edit()
    {
        if (Request::isMethod('get'))
        {            
            $this->layout->content = View::make('user.edit.admin');
        }        
        else if (Request::isMethod('post'))
        {
            $rules = array(
                'new_password' => 'required|confirmed'
            );            
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {                
                return Redirect::to('user/edit')->withErrors($validator)->withInput();                
            } else 
            {
                $user = User::find(Auth::user()->id);           
                $user->password = Hash::make(Input::get('new_password'));
                $user->save();
                $this->layout->content = View::make('user.edit.admin')
                            ->with('message', array('main' => 'Los nuevos datos de tu cuenta se han guardado correctamente.'));
            }
        }
    }  
}