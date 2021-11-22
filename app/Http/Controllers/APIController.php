<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\member;

class APIController extends Controller
{
    public function members()
    {
        $members;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/member';

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);

        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $members=$json;
        }
        curl_close($ch);

        return view('api.member',compact('members'));
    }

    function membershow($id){
        
        $member;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/member/show/'.$id;

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);

        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $member=$json;
        }
        curl_close($ch);
        return view('api.showmember',compact('member'));
    }
    function memberupdate(Request $request){
        $id=$request->id;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/update/member/'.$id;

    $name=$request->name;
    $email=$request->email;
        $data=array(
            'name'=>$name,
            'email'=>$email
        );
        $data=http_build_query($data);


        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        if($error = curl_error($ch)){
            echo $error;
        }
        curl_close($ch);

        return redirect()->route('APImembers');
    }
    function membersearch(Request $req){
        $searchTerm=$req->searchTerm;
        $members;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/member/search/'.$searchTerm;

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);

        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $members=$json;
        }
        curl_close($ch);

        return view('api.member',compact('members'));
    }

    //book
    public function books()
    {
        $books;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/view/books';

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);

        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $books=$json;
        }
        curl_close($ch);

        return view('api.book',compact('books'));
    }

    function bookshow($id){
        
        $book;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/book/show/'.$id;

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);

        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $book=$json;
        }
        curl_close($ch);
        return view('api.showbook',compact('book'));
    }
    function bookupdate(Request $request){
        $id=$request->id;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/update/book/'.$id;

    $bn=$request->book_name;
    $bc=$request->book_color;
        $data=array(
            'book_nm'=>$bn,
            'book_color'=>$bc
        );
        $data=http_build_query($data);


        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        if($error = curl_error($ch)){
            echo $error;
        }
        curl_close($ch);

        return redirect()->route('APIbooks');
    }
    function booksearch(Request $req){
        $searchTerm=$req->searchTerm;
        // dd($searchTerm);
        $books;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/book/search/'.$searchTerm;

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // print_r($res);
        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            $json=json_decode($res,true);
            $books=$json;
            // dd($books);
        }
        curl_close($ch);

        return view('api.book',compact('books'));
    }
}
