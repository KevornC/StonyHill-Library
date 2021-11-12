<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\member;
use Livewire\WithPagination;

class Memberslivewire extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $trn;
    public $telephone;
    public $address;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'name'=>'required | string |  min:2 |unique:members',
        'email'=>'required | email | min:3 |unique:members',
        'trn'=>'required |unique:members',
        'telephone'=>'required |unique:members',
        'address'=>'required | string | min:2'
    ];
 
    // protected $messages = [
    // ];
 
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
    $member=member::find($id);
    $this->editid=$id;
    $this->name=$member->name;
    $this->email=$member->email;
    $this->trn=$member->trn;
    $this->telephone=$member->telephone;
    $this->address=$member->address;
}

public function update(){
    $member=member::find($this->editid);
    $member->name=$this->name;
    $member->email=$this->email;
    $member->trn=$this->trn;
    $member->telephone=$this->telephone;
    $member->address=$this->address;
    $member->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    $this->resetForm();
    sleep(1);
}

    private function resetForm()
    {
        $this->name='';
        $this->email='';
        $this->trn='';
        $this->telephone='';
        $this->address='';
    }

    function Onsubmit(){

    $registration=$this->validate();
    $registration['name']=$this->name;
    $registration['email']=$this->email;
    $registration['trn']=$this->trn;
    $registration['telephone']=$this->telephone;
    $registration['address']=$this->address;
        member::create([
            'name'=>$registration['name'],
            'email'=>$registration['email'],
            'trn'=>$registration['trn'],
            'telephone'=>$registration['telephone'],
            'address'=>$registration['address']
        ]);

    $check=member::where('name',$registration['name'])->count();
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
        return view('livewire.memberslivewire',[
            'members'		=>	member::where(function($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                          ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                          ->orWhere('trn', 'like', '%'.$this->searchTerm.'%');
            })->paginate(5)
        ]);
    }
}
