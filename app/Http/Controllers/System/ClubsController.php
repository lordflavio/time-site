<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clubs;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClubsRequest;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Clubs::all();
        return view('Admin/Club/clubs',compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin/Club/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubsRequest $request)
    {
       $img = $request->file('shild');
        
        $dataForm = $request->all();
        $dataForm['shild'] = '';
        
        $insert = Clubs::create($dataForm);
        
        if($insert){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            
            $insert->shild = '/images/clubs/'.$n_nome.'-'.$insert->id.'.'.$extencao;
            
            if ($img->move('./images/clubs/',$n_nome.'-'.$insert->id.'.'.$extencao)) {
                $insert->save();
                Session::flash('success','Novo Clube registrado!');
             return redirect()->route('clubes.index');
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
      $club = Clubs::find($id);
       return view('Admin/Club/edit',  compact('club'));
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
        $club = Clubs::find($id);
        $club->name = $request->name;
        $club->description = $request->description;
        
        $img = $request->file('shild');
        if(isset($img)){
             $extencao = $img->getClientOriginalExtension();
            if ($extencao != 'jpg' && $extencao != 'png') {
                Session::flash('warning', 'Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome = strtolower(mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

            unlink(".".$club->img);
            $club->shild = '/images/clubs/' . $n_nome . '-' . $club->id . '.' . $extencao;
            
            if ($img->move('./images/clubs/', $n_nome . '-' . $club->id . '.' . $extencao)){
                $club->save();
                Session::flash('success', 'Atualizado com sucesso!');
                return redirect()->route('clubes.index');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
        }else{
            $club->save();
            Session::flash('success', 'Atualizado com sucesso!');
            return redirect()->route('clubes.index');
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
       unlink('.'.Clubs::find($id)->shild);
       Clubs::destroy($id);
       Session::flash('warning','Club Removido!');
       return redirect()->route('clubes.index');
    }
}
