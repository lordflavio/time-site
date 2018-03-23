<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\backing;
use App\Http\Requests\BakingRequest;
use Illuminate\Support\Facades\Session;

class BackingController extends Controller
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
    public function store(BakingRequest $request)
    {
        $img = $request->file('img');
        
        $dataForm = $request->all();
        $dataForm['img'] = '';
        
        $insert = backing::create($dataForm);
        
         if($insert){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            
            $insert->img = '/images/apoio/'.$n_nome.'-'.$insert->id.'.'.$extencao;
            
            if ($img->move('./images/apoio/',$n_nome.'-'.$insert->id.'.'.$extencao)) {
                $insert->save();
                Session::flash('success', 'Registrado!');
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
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       unlink('.'.backing::find($id)->img);
       backing::destroy($id);
       Session::flash('warning','Removido');
       return redirect()->route('home');
    }
}
