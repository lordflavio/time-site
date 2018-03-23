<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function insert($img, $location){
   
            $extencao = $img->getClientOriginalExtension();
        if ($extencao != 'jpg' && $extencao != 'png') {
            Session::flash('warning', 'Tipo de imagem invalido!');
            return back();
        }

        if ($img->move($location . $extencao)) {
            return true;
        } else {
            Session::flash('warning', 'Problema no envio, tente novamente!');
            return back();
        }
    }

}
