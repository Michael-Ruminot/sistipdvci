<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
use App\Models\SedesModel;
use App\Models\TipoactivosModel;
use App\Models\ActivosModel;

class Activos extends BaseController
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

        $activosModel = new ActivosModel();
        $data['activos'] = $activosModel->activosJoin();

        return view('activos/index', $data);
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

        $activosModel = new TipoactivosModel();
        $data['tipoactivos'] = $activosModel->findAll();

        $empleadosModel = new EmpleadosModel();
        $data['empleados'] = $empleadosModel->findAll();

        $sedesModel = new SedesModel();
        $data['sedes'] = $sedesModel->findAll();

        return view('activos/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'serie' => 'required|is_unique[activos.serie]',
            'modelo' => 'required|max_length[50]',
            'fabricante' => 'required|max_length[50]',
            'descripcion' => 'required|max_length[250]',
            'tipo' => 'required',
            'sede' => 'required',
            'empleado' => 'required'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['serie', 'modelo', 'fabricante', 'descripcion', 'mantencion', 'tipo', 'sede', 'empleado']);

        $activosModel = new ActivosModel();

        $activosModel->insert([
            'serie' => trim($post['serie']),
            'modelo' => trim($post['modelo']),
            'fabricante' => trim($post['fabricante']),
            'descripcion' => $post['descripcion'],
            'mantencion' => trim($post['mantencion']),
            'ruta' => trim($post['ruta']),
            'id_tipo' => $post['tipo'],
            'id_sede' => $post['sede'],
            'id_empleado' => $post['empleado'],
        ]);

        return redirect()->to('activos');
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
            return redirect()->route('activos');
        }

        $activoModel = new ActivosModel();
        $data['activo'] = $activoModel->find($id);

        $activosModel = new TipoactivosModel();
        $data['tipoactivos'] = $activosModel->findAll();

        $empleadosModel = new EmpleadosModel();
        $data['empleados'] = $empleadosModel->findAll();

        $sedesModel = new SedesModel();
        $data['sedes'] = $sedesModel->findAll();

        return view('activos/editar', $data);
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
            return redirect()->route('activos');
        }

        $reglas = [
            'serie' => "required|is_unique[activos.serie,id,{$id}]",
            'modelo' => 'required|max_length[50]',
            'fabricante' => 'required|max_length[50]',
            'descripcion' => 'required|max_length[250]',
            'tipo' => 'required',
            'sede' => 'required',
            'empleado' => 'required'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            // Retorna al formulario, le pasa los elementos que se ingresaron pero tambien pasando el elemento error el cual contiene todos los errores.
        }

        $post = $this->request->getPost(['serie', 'modelo', 'fabricante', 'descripcion', 'mantencion', 'tipo', 'sede', 'empleado']);

        $activosModel = new ActivosModel();
        $activosModel->update($id, [
            'serie' => trim($post['serie']),
            'modelo' => trim($post['modelo']),
            'fabricante' => trim($post['fabricante']),
            'descripcion' => trim($post['descripcion']),
            'mantencion' => trim($post['mantencion']),
            'id_tipo' => trim($post['tipo']),
            'id_sede' => trim($post['sede']),
            'id_empleado' => trim($post['empleado']),
        ]);

        return redirect()->to('activos');
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
            return redirect()->route('activos');
        }

        $activosModel = new ActivosModel();
        $activosModel->delete($id);

        return redirect()->to('activos');
    }
}
