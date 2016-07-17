<?php
class CartController extends BaseController {
    
    /**
     * The current layout
     * 
     * @var string
     */
    protected $layout = 'layouts.guest';    
    
    /**
     * When this action receives a GET HTTP request, it renders the form with 
     * empty fields. Otherwise, when the HTTP request is POST, this action 
     * tries to validate the form and store the new order into the database.
     * 
     * @return void
     */
    public function confirm()
    {        
        $this->layout->content = View::make('cart.confirm');        
        if (Request::isMethod('get'))
        {            
            $this->layout->content = View::make('cart.confirm');
        }        
        else if (Request::isMethod('post'))
        {
            /* This is a fairly basic set of validation rules. It's here to show you how 
             * Laravel's form validation works. So it is left as an exercise for you 
             * to complete it and adapt to your megalibros e-commerce system.
             */
            $rules = array(
                'name' => 'required',
                'email' => 'required|email',
                'tel' => 'required',
                'address' => 'required',
                'payment' => 'required'
            );            
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {                
                return Redirect::to('cart/confirm')
                        ->withErrors($validator)->withInput();                
            } 
            else 
            {            
                $cart = json_decode(Input::get('cart'));
                $description = '';
                foreach($cart->data->items as $item) 
                    $description .= "<p>({$item->isbn}) {$item->title}</p>";
                $order = new Order; 
                $order->name = Input::get('name');
                $order->email = Input::get('email');
                $order->tel = Input::get('tel');
                $order->address = Input::get('address');
                $order->description = $description;
                $order->price = $cart->data->price;
                $order->payment = Input::get('payment');
                $order->save();
                $this->layout->content = View::make('cart.confirm')->with('message', array(
                    'main' => '¡Gracias por comprar en Mega Libros!', 
                    'secondary' => 'Te hemos enviado un mensaje de correo electrónico, en menos de 24 horas atenderemos tu pedido.'));
            }
        }        
    }    
}