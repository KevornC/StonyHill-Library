<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\book;
use Livewire\WithPagination;
class Bookslivewire extends Component
{
    use WithPagination;
    public $book_nm;
    public $book_color;
    public $total_pages;
    public $book_condition;
    public $book_quantity;
    public $author_nm;
    public $publisher;
    public $date_published;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'book_nm'=>'required | string | min:2 |unique:books',
        'book_color'=>'required | string | min:2 ',
        'total_pages'=>'required |numeric| min:10 | max:500',
        'book_condition'=>'required',
        'book_quantity'=>'required | numeric ',
        'author_nm'=>'required | string | min:2 ',
        'publisher'=>'required | string | min:2',
        'date_published'=>'required',
    ];
 
    protected $messages = [
        'book_nm.required'=>'The book name is required',
        'author_nm'=>'The author name is required',
    ];
 
    // protected $validationAttributes = [
    //     'email' => 'email address'
    // ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
    
public function add(){
    $this->addmode=true;
}
public function view(){
    $this->addmode=false;
}

public function edit(){
    
}

public function editmode($id){
    $this->editmode=true;
    $book=book::find($id);
    $this->editid=$id;
    $this->book_nm=$book->book_nm;
    $this->book_color=$book->book_color;
    $this->total_pages=$book->total_pages;
    $this->book_condition=$book->book_condition;
    $this->book_quantity=$book->book_quantity;
    $this->author_nm=$book->author_nm;
    $this->publisher=$book->publisher;
    $this->date_published=$book->date_published;
}

public function update(){
    $book=book::find($this->editid);
    $book->book_nm=$this->book_nm;
    $book->book_color=$this->book_color;
    $book->total_pages=$this->total_pages;
    $book->book_condition=$this->book_condition;
    $book->book_quantity=$this->book_quantity;
    $book->author_nm=$this->author_nm;
    $book->publisher=$this->publisher;
    $book->date_published=$this->date_published;
    $book->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    $this->resetForm();
    sleep(1);
}

    private function resetForm()
    {
        $this->book_nm='';
        $this->book_color='';
        $this->total_pages='';
        $this->book_condition='';
        $this->book_quantity='';
        $this->author_nm='';
        $this->publisher='';
        $this->date_published='';
    }

    function Onsubmit(){

    $registration=$this->validate();
    $registration['bookname']=$this->book_nm;
    $registration['bookcolor']=$this->book_color;
    $registration['pages']=$this->total_pages;
    $registration['condition']=$this->book_condition;
    $registration['quantity']=$this->book_quantity;
    $registration['author']=$this->author_nm;
    $registration['publisher']=$this->publisher;
    $registration['datepublished']=$this->date_published;
        book::create([
            'book_nm'=>$registration['bookname'],
            'book_color'=>$registration['bookcolor'],
            'total_pages'=>$registration['pages'],
            'book_condition'=>$registration['condition'],
            'book_quantity'=>$registration['quantity'],
            'author_nm'=>$registration['author'],
            'publisher'=>$registration['publisher'],
            'date_published'=>$registration['datepublished'],
        ]);

    $check=book::where('book_nm',$registration['bookname'])->count();
    // dd($check);
    if($check==1 ){
        $this->successMsg="Added Successfully";
        $this->addmode=false;
        sleep(1);
    
        // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
            $this->resetForm();
    }elseif($check==0){
        // $this->successMsg = 'We received your message successfully and will get back to you shortly!';
        $this->successMsg="Failed";
        $this->addmode=true;
    }
   

    }
    public function render()
    {
        return view('livewire.bookslivewire',[
        'books'		=>	book::where(function($sub_query){
            $sub_query->where('book_nm', 'like', '%'.$this->searchTerm.'%')
                      ->orWhere('author_nm', 'like', '%'.$this->searchTerm.'%')
                      ->orWhere('publisher', 'like', '%'.$this->searchTerm.'%');
        })->paginate(5)
        ]);
    }
}
