<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('Admin/Player/players',  compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Player/new',  compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $img = $request->file('img');
        
        $dataForm = $request->all();
        $dataForm['img'] = '';
        
        $insert = Player::create($dataForm);
        
        if($insert){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            
            $insert->img = '/images/players/'.$n_nome.'-'.$insert->id.'.'.$extencao;
            
            if ($img->move('./images/players/',$n_nome.'-'.$insert->id.'.'.$extencao)) {
                $insert->save();
                Session::flash('success','Novo jogador registrado!');
             return redirect()->route('jogadores.index');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
            
            echo $insert->name;
            
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
       $player = Player::find($id);
       return view('Admin/Player/edit',  compact('player'));
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
        $player = Player::find($id);
        $player->name = $request->name;
        $player->position = $request->position;
        $player->number = $request->number;
        
        $img = $request->file('img');
        if(isset($img)){
             $extencao = $img->getClientOriginalExtension();
            if ($extencao != 'jpg' && $extencao != 'png') {
                Session::flash('warning', 'Tipo de imagem invalido!');
                return back();
            }
            
            $n_nome = strtolower(mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));
                
            unlink(".".$player->img);
            $player->img = '/images/players/' . $n_nome . '-' . $player->id . '.' . $extencao;
            
            if ($img->move('./images/players/', $n_nome . '-' . $player->id . '.' . $extencao)){
                $player->save();
                Session::flash('success', 'Atualizado com sucesso!');
                return redirect()->route('jogadores.index');
            } else {
                Session::flash('warning', 'Problema no envio, tente novamente!');
                return back();
            }
        }else{
            $player->save();
            Session::flash('success', 'Atualizado com sucesso!');
            return redirect()->route('jogadores.index');
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
       unlink('.'.Player::find($id)->img);
       Player::destroy($id);
       Session::flash('warning','jogador Removido!');
       return redirect()->route('jogadores.index');
    }
    
}
