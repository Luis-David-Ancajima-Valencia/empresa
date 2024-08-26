<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticulosModel extends Model
{
    protected $table            = 'articulos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'nombre', 'precio', 'stock',  'id_categoria'];
    
    // Dates
    protected $useTimestamps = false;

    public function articulosCategoria()
    {
        return $this->select('articulos.*, categorias.descripcion AS categoria')
            ->join('categorias', 'articulos.id_categoria = categorias.id')
            ->findAll();
    }
  
}
