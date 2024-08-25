<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $empleados = new EmpleadosModel();
        $checkEmpleados = $empleados->where('username', $username)->first();

        if ($checkEmpleados) {
            // si los datos son validos
            $checkPassword = password_verify($password, $checkEmpleados['password']);
            if ($checkPassword) {
                // si la contraseña es válida
                $sessData = [
                    'id' => $checkEmpleados['id'],
                    'nombre' => $checkEmpleados['nombre'],
                    'apellido' => $checkEmpleados['apellido'],
                    'username' => $checkEmpleados['username'],
                    'password' => $checkEmpleados['password'],
                    'correo' => $checkEmpleados['correo'],
                    'cargo' => $checkEmpleados['cargo'],
                    'id_rol' => $checkEmpleados['id_rol'],
                    'id_sede' => $checkEmpleados['id_sede'],
                    'id_departamento' => $checkEmpleados['id_departamento'],
                    'logged_in' => TRUE,
                ];

                $session->set($sessData);
                switch($checkEmpleados['id_rol']){
                    case 1:
                        return redirect()->to('/admin');
                        break;
                    case 2:
                        return redirect()->to('/user');
                        break;
                    default:
                        session()->setFlashdata('error', 'Aun no has iniciado sesión');
                        return redirect()->to('/');
                    break;
                }

            } else {
                // si la contraseña no es válida
                session()->setFlashdata('error', 'Error al iniciar sesión, usuario y/o contraseña incorrectos');
                return redirect()->to('/');
            }
        } else {
            // si los datos no son válidos
            session()->setFlashdata('error', 'Error al iniciar sesión, usuario y/o contraseña incorrectos');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
