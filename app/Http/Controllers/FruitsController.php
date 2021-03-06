<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FruitsController extends Controller
{
   public function face(){
     $post=DB::table('mamuntable')->get();
     //dd($post);
       $date['all']=$post;
       //dd($date);
       return view('fruits.index',$date);
   }
   public function  create(){
       return view('fruits.create');
   }
   public function store(Request $request){
       // exit('YES');
       $request->validate([
           'name' => 'required',
           'price'=>'required',
           'details'=>'required',
       ]);
       $a['name']=$request->name;
       $a['price']=$request->price;
       $a['details']=$request->details;
       $a['created_at']=now();
       DB::table('mamuntable')->insert($a);
       return redirect()->to('fruitspage');
   }
  public function edit($id){
    //dd($id);
      $p=DB::table('mamuntable')->where('id',$id)->first();
      $stud['all']=$p;
      return view('fruits.edit',$stud);
  }
  public function edited (Request $request,$id){
       $validation['name']='required';
       $validation['price']='required';
       $validation['details']='required';
       $request->validate($validation);
    $as['name']=$request->name;
    $as['price']=$request->price;
    $as['details']=$request->details;
    // dd($as);
      $as['updated_at']=now();
      DB::table('mamuntable')->where('id',$id)->update($as);
      return redirect()->to('fruitspage');
  }
  public function delete($id){
       DB::table('mamuntable')->where('id',$id)->delete();
       return redirect('fruitspage');
  }
}
