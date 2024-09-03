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

    private $encrypter;

    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
    }

    public function index()
    {
        $empleadosModel = new EmpleadosModel();
        $data['empleados'] = $empleadosModel->empleadosJoin();

        return view('empleados/index', $data);    //retornamos vista desde la carpeta views
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
            'nombre' => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'username' => 'required|is_unique[empleados.username]',
            'password' => 'required|max_length[250]|min_length[5]',
            // 'repassword' => 'matches[password]',
            'correo' => 'required|max_length[250]|valid_email|is_unique[empleados.correo]',
            'cargo' => 'required|max_length[100]',
            'fecha_nacimiento' => 'required',
            'rol' => 'required|is_not_unique[roles.id]',
            'sede' => 'required|is_not_unique[sedes.id]',
            'departamento' => 'required|is_not_unique[departamentos.id]',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['nombre', 'apellido', 'username', 'password', 'correo', 'cargo', 'fecha_nacimiento', 'departamento', 'rol', 'sede', 'departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->insert([
            'nombre' => trim($post['nombre']),
            'apellido' => trim($post['apellido']),
            'username' => trim($post['username']),
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'correo' => trim($post['correo']),
            'cargo' => trim($post['cargo']),
            'fecha_nacimiento' => $post['fecha_nacimiento'],
            'id_rol' => $post['rol'],
            'id_sede' => $post['sede'],
            'id_departamento' => $post['departamento'],
        ]);

        session()->setFlashdata('message', 'Usuario agregado correctamente!');

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
        if ($id == null) {
            return redirect()->route('empleados');
        }

        $empleadosModel = new EmpleadosModel();
        $data['empleado'] = $empleadosModel->find($id);

        $departamentosModel = new DepartamentosModel();
        $data['departamentos'] = $departamentosModel->findAll();

        $rolesModel = new RolesModel();
        $data['roles'] = $rolesModel->findAll();

        $sedesModel = new SedesModel();
        $data['sedes'] = $sedesModel->findAll();

        return view('empleados/editar', $data);
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
        //Validando que id recibido sea por metodo put
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('empleados');
        }

        $reglas = [
            'nombre' => 'required|max_length[50]',
            'apellido' => 'required|max_length[50]',
            'username' => "required|is_unique[empleados.username,id,{$id}]", // Con esta validación nos evitamos que el programa piense que el campo existe. 
            //Ignorando este id que le estamos pasando
            'correo' => "valid_email|is_unique[empleados.correo,id,{$id}]",
            'cargo' => 'required|max_length[100]',
            'fecha_nacimiento' => 'required',
            'rol' => 'required|is_not_unique[roles.id]',
            'sede' => 'required|is_not_unique[sedes.id]',
            'departamento' => 'required|is_not_unique[departamentos.id]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['nombre', 'apellido', 'username', 'password', 'correo', 'cargo', 'fecha_nacimiento', 'departamento', 'rol', 'sede', 'departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->update($id, [
            'nombre' => trim($post['nombre']),
            'apellido' => trim($post['apellido']),
            'username' => trim($post['username']),
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'correo' => trim($post['correo']),
            'cargo' => trim($post['cargo']),
            'fecha_nacimiento' => $post['fecha_nacimiento'],
            'id_rol' => $post['rol'],
            'id_sede' => $post['sede'],
            'id_departamento' => $post['departamento'],
        ]);

        session()->setFlashdata('message', 'Usuario actualizado correctamente!');

        return redirect()->to('empleados');
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
        //Validando que id recibido sea por metodo delete
        if (!$this->request->is('delete') || $id == null) {
            return redirect()->route('empleados');
        }

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->delete($id);

        session()->setFlashdata('message', 'Usuario eliminado correctamente!');
        return redirect()->to('empleados');
    }


}
