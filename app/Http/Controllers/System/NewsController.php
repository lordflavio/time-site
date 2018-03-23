<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {   
        $img = $request->file('img');
        
        $dataForm = $request->all();
        $dataForm['img'] = '';
        
        $insert = News::create($dataForm);
        
         if($insert){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->title)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            
            $insert->img = '/images/news/'.$n_nome.'-'.$insert->id.'.'.$extencao;
            
            if ($img->move('./images/news/',$n_nome.'-'.$insert->id.'.'.$extencao)) {
                $insert->save();
                Session::flash('success','Nova notícia registrada!');
             return redirect()->route('home');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
 
        }else{
             Session::flash('warning','Problema no registro tente novamente!');
             return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        return view('Admin/Home/newEdit',  compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $new = News::find($id);
       
       $new->title = $request->title;
       $new->author = $request->author;
       $new->matter = $request->matter;
       
       if($request->date != null){
           $new->date = $request->date;
       }
       $img = $request->file('img');
        if(isset($img)){
           $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->title)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            unlink("." . $new->img);
            $new->img = '/images/news/' . $n_nome . '-' . $new->id . '.' . $extencao;
            
            if ($img->move('./images/news/',$n_nome.'-'.$new->id.'.'.$extencao)) {
                $new->save();
                Session::flash('success','Notícia Atualizada!');
             return redirect()->route('home');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
        }else{
            $new->save();
            Session::flash('success', 'Notícia Atualizada!');
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       unlink('.'.News::find($id)->img);
       News::destroy($id);
       Session::flash('warning','Notícia Removida!');
       return redirect()->route('home');
    }
}
