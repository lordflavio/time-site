<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GamesRequest;
use App\Models\Game;
use App\Models\Clubs;
use Illuminate\Support\Facades\Session;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('Admin/Game/games',  compact('games'));

//        foreach($games as $game){
//           
//           $test = $game->game()->get();
//            
//        }
//        
//       echo $test[0]->shild;
//        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $clubs = Clubs::all();
         return view('Admin/Game/new',  compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GamesRequest $request)
    {
        if($request->club1 != 0 && $request->club2 != 0){
            $dataForm['date'] = $request->date;
            $dataForm['time'] = $request->time;
            $dataForm['address'] = $request->address;
            $dataForm['description'] = $request->description;

            $dataFormClubs[$request->club1] = ['gols' => 0];
            $dataFormClubs[$request->club2] = ['gols' => 0];

            $insert = Game::create($dataForm);
            $insert->game()->attach($dataFormClubs);

            if ($insert) {
                Session::flash('success', 'Novo jogo registrado!');
                return redirect()->route('jogos.index');
            } else {
                Session::flash('warning', 'Problema tente novamente!');
                return back();
            }
        }else{
            Session::flash('info', 'Selecione os times !');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        $clubs = Clubs::all();
        $clube = $game->game()->get();

        return view('Admin/Game/edit',  compact('clubs','game','clube'));
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
       
        $game = Game::find($id);
        $clubs = $game->game()->get();
        
        $game->time = $request->time;
        $game->address = $request->address;
        $game->description = $request->description;
        
       if($request->date == null){
           $game->save();
           $game->game()->updateExistingPivot($clubs[0]->id,  ['gols' => $request->golsClub1]);
           $game->game()->updateExistingPivot($clubs[1]->id,  ['gols' => $request->golsClub2]);
           
            Session::flash('success', 'Jogo Atualizado!');
            return redirect()->route('jogos.index');
           
       }else{
           $game->date = $request->date;
           $game->save();
           $game->game()->updateExistingPivot($clubs[0]->id, ['gols' => $request->golsClub1]);
           $game->game()->updateExistingPivot($clubs[1]->id, ['gols' => $request->golsClub2]);
           
            Session::flash('success', 'Jogo Atualizado!');
            return redirect()->route('jogos.index'); 
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
       Game::destroy($id);
       Session::flash('warning','Jogo Removido!');
       return redirect()->route('jogos.index');
    }
    
    public function occurred()
    {
        $data = date('Y-m-d');
        
        $games = Game::where('date','<',$data)->get();
        return view('Admin/Game/games', compact('games'));
        

    }
    
    public function future()
    {
        $data = date('Y-m-d');
        $games = Game::where('date','>',$data)->get();
        return view('Admin/Game/games', compact('games'));
    }
}
