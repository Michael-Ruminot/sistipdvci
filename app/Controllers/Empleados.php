<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

use App\Controllers\BaseController;
use App\Models\DepartamentosModel;
use App\Models\EmpleadosModel;
use App\Models\RolesModel;
use App\Models\SedesModel;

class Empleados extends BaseController
{

    protected $helpers = ['form'];
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return view('empleados/index');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $departamentosModel = new DepartamentosModel();
        $data['departamentos'] = $departamentosModel->findAll();

        $rolesModel = new RolesModel();
        $data['roles'] = $rolesModel->findAll();

        $sedesModel = new SedesModel();
        $data['sedes'] = $sedesModel->findAll();

        return view('empleados/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'nombre' => 'required',
            'apellido' => 'required',
            'username' => 'required|is_unique[empleados.username]',
            'password' => 'required|min_length[5]|max_length[10]',
            'correo' => 'valid_email|is_unique[empleados.correo]',
            'cargo' => 'required',
            'fecha_nacimiento' => 'required',
            'rol' => 'required|is_not_unique[roles.id]',
            'sede' => 'required|is_not_unique[sedes.id]',
            'departamento' => 'required|is_not_unique[departamentos.id]',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['nombre','apellido','username','password','correo','cargo','fecha_nacimiento','departamento','rol','sede','departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->insert([
            'nombre' => trim($post['nombre']),
            'apellido' => trim($post['apellido']),
            'username' => trim($post['username']),
            'password' => $post['password'],
            'correo' => trim($post['correo']),
            'cargo' => trim($post['cargo']),
            'fecha_nacimiento' => $post['fecha_nacimiento'],
            'id_rol' => $post['rol'],
            'id_sede' => $post['sede'],
            'id_departamento' => $post['departamento'],
        ]);

        return redirect()->to('empleados');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
