<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ArticulosModel;
use App\Controllers\BaseController;


class Articulos extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $articulosModel = new ArticulosModel();
        $data['articulos'] = $articulosModel->articulosCategoria();

        return view('articulos/index', $data);
    }

    public function new()
    {
        $categoriasModel = new CategoriasModel();
        $data['categorias'] = $categoriasModel->findAll();

        return view('articulos/nuevo', $data);
    }

    public function create()
    {
        $reglas = [
            'nombre'           => 'required',
            'precio'           => 'required',
            'stock'            => 'required',
            'categoria'        => 'required|is_not_unique[categorias.id]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'precio', 'stock', 'categoria']);

        $articulosModel = new ArticulosModel();
        $articulosModel->insert([
            'nombre'           => trim($post['nombre']),
            'precio'           => $post['precio'],
            'stock'            => $post['stock'],
            'id_categoria'     => $post['categoria'],
        ]);

        return redirect()->to('articulos');
    }
   
    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('articulos');
        }

        $articulosModel = new ArticulosModel();
        $categoriasModel = new CategoriasModel();

        $data['categorias'] = $categoriasModel->findAll();
        $data['articulo'] = $articulosModel->find($id);

        return view('articulos/editar', $data);
    }

    public function update($id = null)
    {
        if ($id == null) {
            return redirect()->route('articulos');
        }
        
        $reglas = [
            'nombre'        => 'required',
            'precio'        => 'required',
            'stock'         => 'required',
            'categoria'     => 'required|is_not_unique[categorias.id]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'precio', 'stock', 'categoria']);

        $articulosModel = new ArticulosModel();
        $articulosModel->update($id, [
            'nombre'           => trim($post['nombre']),
            'precio'           => $post['precio'],
            'stock'            => $post['stock'],
            'id_categoria'     => $post['categoria'],
        ]);

        return redirect()->to('articulos');
    }

     
    public function delete($id = null)
    {
        if ( $id == null) {
            return redirect()->route('articulos');
        }

        $articulosModel = new ArticulosModel();
        $articulosModel->delete($id);

        return redirect()->to('articulos');
    }
}
