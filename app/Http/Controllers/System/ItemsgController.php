<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\item;
use App\Http\Requests\ItemsRequest;
use Illuminate\Support\Facades\Session;

class ItemsgController extends Controller
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
    public function store(ItemsRequest $request)
    {
        $img = $request->file('img');
        
        $dataForm = $request->all();
        $dataForm['img'] = '';
        
        $insert = item::create($dataForm);
        
         if($insert){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->title)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            
            $insert->img = '/images/items/'.$n_nome.'-'.$insert->id.'.'.$extencao;
            
            if ($img->move('./images/items/',$n_nome.'-'.$insert->id.'.'.$extencao)) {
                $insert->save();
                Session::flash('success','Novo Item registrado!');
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
        $item = item::find($id);
        return view('Admin/Home/itemEdit',  compact('item'));
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
        $item = item::find($id);
       
       $item->title = $request->title;
       $item->price = $request->price;
       
       $img = $request->file('img');
        if(isset($img)){
           $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->title)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

               // unlink(".".$item->img);
                $item->img = '/images/items/'.$n_nome.'-'.$item->id.'.'.$extencao;
                
            if ($img->move('./images/items/',$n_nome.'-'.$item->id.'.'.$extencao)) {
                $item->save();
                Session::flash('success','Item Atualizado!');
             return redirect()->route('home');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
        }else{
            $item->save();
            Session::flash('success', 'Item Atualizada!');
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
       unlink('.'.item::find($id)->img);
       item::destroy($id);
       Session::flash('warning','Item Removido!');
       return redirect()->route('home');
    }
}
