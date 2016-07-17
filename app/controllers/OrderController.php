<?php

class OrderController extends BaseController {
    
    /**
     * Builds an object of type OrderController
     */    
    public function __construct()
    {
        $this->beforeFilter('auth');  
        $this->beforeFilter(function(){            
            $this->layout = 'layouts.admin';            
        });
    }
    
    /**
     * Gets a list of all the orders.
     * 
     * @return void
     */
    public function index()
    {                
        $this->layout->content = View::make('order.index.admin', array('orders' => Order::orderBy('id', 'DESC')->get()));
    }
    
    /**
     * Edits the given order.
     * 
     * @param integer $id The order id
     * @return Illuminate\Http\RedirectResponse
     */    
    public function edit($id)
    {
        if (Request::isMethod('get'))
        {            
            $this->layout->content = View::make('order.edit.admin')->with('order', Order::find($id));
        }        
        else if (Request::isMethod('post'))
        {       
            $rules = array(
                'name' => 'required',
                'email' => 'required|email',
                'tel' => 'required',
                'address' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'payment' => 'required',
                'status' => 'required'
            );
            
            $validator = Validator::make(Input::all(), $rules);            
            
            if ($validator->fails()) 
            {                
                return Redirect::to('order/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();                
            } else 
            {            
                $order = Order::find($id);                
                $order->name = Input::get('name');
                $order->email = Input::get('email');
                $order->tel = Input::get('tel');
                $order->address = Input::get('address');
                $order->description = Input::get('description');
                $order->price = Input::get('price');
                $order->payment = Input::get('payment');
                $order->status = Input::get('status');
                $order->save();
                return Redirect::to('order/index');
            }
        }
    }
    
    /**
     * Creates an empty order.
     * 
     * @return Illuminate\Http\RedirectResponse
     */    
    public function create()
    {    
        $order = new Order;        
        $order->save();        
        return Redirect::to('order/index');
    }
    
    /**
     * Removes the given order.
     * 
     * @param integer $id The order id
     * @return Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Order::find($id)->delete();        
        return Redirect::to('order/index');
    }

}