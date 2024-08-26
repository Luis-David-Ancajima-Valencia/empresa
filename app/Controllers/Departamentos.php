<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartamentosModel;
use CodeIgniter\HTTP\ResponseInterface;

class Departamentos extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $departamentosModel = new DepartamentosModel();
        $data['departamentos'] = $departamentosModel->findAll();

        return view('departamentos/index',$data);
    }

    public function new()
    {
        return view('departamentos/nuevo');
    }

    public function create()
    {
        $reglas = ['nombre' => 'required'];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'descripcion']);

        $departamentosModel = new DepartamentosModel();
        $departamentosModel->insert([
            'nombre'           => trim($post['nombre']),
            'descripcion'      => $post['descripcion']
        ]);

        return redirect()->to('departamentos');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('departamentos');
        }

        $departamentosModel = new DepartamentosModel();
        $data['departamento'] = $departamentosModel->find($id);

        return view('departamentos/editar', $data);
    }

    public function update($id = null)
    {
        if ($id == null) {
            return redirect()->route('departamentos');
        }
        
        $reglas = ['nombre' => 'required'];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost([ 'nombre', 'descripcion']);

        $departamentosModel = new DepartamentosModel();
        $departamentosModel->update($id, [
            'nombre'           => trim($post['nombre']),
            'descripcion'      => $post['descripcion']
        ]);

        return redirect()->to('departamentos');
    }

    public function delete($id = null)
    {
        if ( $id == null) {
            return redirect()->route('departamentos');
        }

        $departamentosModel = new DepartamentosModel();
        $departamentosModel->delete($id);

        return redirect()->to('departamentos');
    }
    
}
