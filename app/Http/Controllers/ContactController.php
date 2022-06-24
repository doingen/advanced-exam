<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    
    public function index(Request $request)
    {   
        $form = $request->all();
        return view('index', ['form' => $form]);
    }

    public function confirm(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $form = $request->all();
        $form['fullname'] = $request->lastname. " ". $request->firstname;
        return view('confirm', ['form' => $form]);
    }

    public function store(Request $request)
    {   
        $form =  $request->all();
        Contact::create($form);
        return view('thanks');
    }

    public function search()
    {
        return view('manage');
    }

    public function show()
    {   
        //"お名前"による抽出
        if (!empty($_GET["name"])){
            $results = Contact::where('fullname', 'LIKE',"%{$_GET["name"]}%")->get();
        }
        
        //"性別"による抽出
        if($_GET["gender"] == 1){
            if(empty($results)){
                $results = Contact::where('gender', 1)->get();
            }
            else{
                $gender = Contact::where('gender', 1)->get();
                $results = $results->concat($gender);
            }
        }
        elseif($_GET["gender"] == 2){
            if(empty($results)){
                $results = Contact::where('gender', 2)->get();
                
            }
            else{
                $gender = Contact::where('gender', 2)->get();
                $results = $results->concat($gender);
            }
        }
        elseif(empty($results)){
            $results = Contact::all();
        }
        
        //"登録日"による抽出
        if(!empty($_GET['created_at_start'])){

            $start = $_GET['created_at_start'];

            if(!empty($end)){
                $end = $_GET['created_at_end'];

                $results = Contact::whereBetween('created_at', [$start, $end])->get();                        
            }
            else{
                $results = Contact::where('created_at', ">=", $start)->get();
            }
        }
        elseif(!empty($_GET['created_at_end'])){

            $end = $_GET['created_at_end'];

            $results = Contact::where('created_at', "<=", $end)->get();
        }

        //"メールアドレス"による抽出
        if (!empty($_GET['email'])){
            if(!empty($results)){
                $email = Contact::where('email', 'LIKE',"%{$_GET['email']}%")->get();
                $results = $results->concat($email);
            }
            else{
                $results = Contact::where('email', 'LIKE',"%{$_GET['email']}%")->get();
            }
        }
        
        //各抽出結果の重複したフィールドのみを抽出
        if($results->duplicates()->isNotEmpty()){
            $results = $results->duplicates();
        }
        
        return view('manage', ['results'  => $results]); 
    }

    public function delete(Request $request){
        $resultPage = url()->previous();
        $id = $request->id;
        Contact::find($id)->delete();
        return redirect ($resultPage);
    }
}