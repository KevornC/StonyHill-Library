<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\issuedbook;
use App\Models\member;
use App\Models\book;
use Livewire\WithPagination;
use Carbon\Carbon;

class Issuedbookslivewire extends Component
{

    use WithPagination;
    public $member_id;
    public $book_id;
    public $issued_date;
    public $address;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'member_id'=>'required',
        'book_id'=>'required',
        'issued_date'=>'required |',
    ];
 
    protected $messages = [
        'member_id.required'=>'Please Select a Member',
        'book_id.required'=>'Please Select a Book'
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
    private function resetForm()
    {
        $this->member_id='';
        $this->book_id='';
        $this->issued_date='';
    }

    function Onsubmit(){

    $registration=$this->validate();
    $registration['member_id']=$this->member_id;
    $registration['book_id']=$this->book_id;
    $registration['issued_date']=$this->issued_date;
    $returndate=date('Y-m-d',strtotime($registration['issued_date'].'+ 14 days'));

        $id=issuedbook::create([
            'member_id'=>$registration['member_id'],
            'book_id'=>$registration['book_id'],
            'issued_date'=>$registration['issued_date'],
            'return_date'=>$returndate,
            'days_remaining'=>'14',
        ])->id;
        $issuebooks=issuedbook::find($id);
        $book_id=$issuebooks->book_id;
        $book=book::find($book_id);
        $quan=$book->book_quantity;
        if($quan!=0){
        $book->book_quantity=$quan-1;
        $book->save();
        }
        

    $check=issuedbook::where('member_id',$registration['member_id'])
                        ->where('book_id',$registration['book_id'])->count();
    // dd($check);
    if($check>=1 ){
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
        $todaysdate=now('Jamaica')->format('d');
        $tday=intval($todaysdate);
        $issuedbooks=issuedbook::all();

        foreach ($issuedbooks as $key) {
            if($key->days_remaining!=0){
            if($todaysdate!=$key->issued_date){
                $returnday=date('d',strtotime($key->return_date));
                $daysremaining=$returnday-$tday;
                issuedbook::where('id',$key->id)->update([
                    'days_remaining'=>$daysremaining,
                ]);
            }
        }
            
        }
        return view('livewire.issuedbookslivewire',[
            'members'          =>member::all(),
            'books'           =>book::all(),
            'issuedbooks'		=>	issuedbook::with('book','member')->where(function($sub_query){
                $sub_query->where('issued_date', 'like', '%'.$this->searchTerm.'%');
            })->paginate(5)
        ]);
    }
}
