<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Produto extends Model
{
    use HasFactory;

    /**
     * Retorna o modelo de categoria associado ao produto.
     * 
     * @return Categoria
     */
    public function getCategoria() {
        return Categoria::findOrFail($this->idcategoria);
    }

}
