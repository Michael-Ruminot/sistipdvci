<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\EmpleadosModel;

class Reset extends BaseController
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

        return view('empleados/reset_password', $data);
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
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

        return view('empleados/reset_password_form', $data);
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
            'password' => 'required|max_length[250]|min_length[5]',
            'repassword' => 'matches[password]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['password']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->update($id, [
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('message', 'Contraseña de usuario actualizada.');

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
        //
    }
}
