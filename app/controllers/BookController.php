<?php

class BookController extends BaseController {
    
    /**
     * Builds an object of type BookController
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'index'));            
        $this->beforeFilter(function(){            
            Auth::check() ? $this->layout = 'layouts.admin' : $this->layout = 'layouts.guest'; 
        });
    }
    
    /**
     * Gets a list of all the books.
     * 
     * @return void
     */
    public function index()
    {        
        if(Auth::check())
        {
            $books = Book::orderBy('id', 'DESC')->get();
            $this->layout->content = View::make('book.index.admin', array('books' => $books));
        }
        else
        {            
            $books = Book::whereNotNull('title')->orderBy('id', 'DESC')->get();
            $this->layout->content = View::make('book.index.guest', array('books' => $books));
        }        
    }    
    
    /**
     * Edits the given book.
     * 
     * @param integer $id The book id
     * @return Illuminate\Http\RedirectResponse
     */    
    public function edit($id)
    {
        if (Request::isMethod('get'))
        {            
            $this->layout->content = View::make('book.edit.admin')->with('book', Book::find($id));
        }        
        else if (Request::isMethod('post'))
        {
            $rules = array(
                'title' => 'required',
                'friendly_url' => 'required',
                'author' => 'required',
                'sinopsis' => 'required',
                'price' => 'required|numeric',
                'image' => 'image|mimes:jpeg,jpg,png|max:500'
            );            
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {                
                return Redirect::to('book/edit/'.$id)->withErrors($validator)->withInput();                
            } else 
            {
                $book = Book::find($id);
                if (Input::hasFile('image'))
                {
                    $filename = Input::file('image')->getClientOriginalName();
                    // A mechanism to avoid filename collisions should be implemented here!, for instance, 
                    // you can add a random prefix to the filename. This is left as an exercise to you.
                    Input::file('image')->move(public_path() . '/assets/img/uploads', $filename);                    
                    $book->image = $filename;
                }                
                $book->isbn = Input::get('isbn');
                $book->title = Input::get('title');
                $book->friendly_url = Input::get('friendly_url');
                $book->author = Input::get('author');
                $book->sinopsis = Input::get('sinopsis');
                $book->price = Input::get('price');
                $book->save();
                return Redirect::to('book/index');
            }
        }
    }    
    
    /**
     * Creates an empty book.
     * 
     * @return Illuminate\Http\RedirectResponse
     */    
    public function create()
    {    
        $book = new Book;        
        $book->save();        
        return Redirect::to('book/index');
    }    
    
    /**
     * Removes the given book.
     * 
     * @param integer $id The book id
     * @return Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Book::find($id)->delete();        
        return Redirect::to('book/index');
    }
}