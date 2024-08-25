<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Debes iniciar sesión como administrador');
            return redirect()->to('/'); // retornamos a la vista login
        }

        if (session()->get('id_rol') != 1) {
            session()->setFlashdata('error', 'Debes iniciar sesión como administrador');
            return redirect()->to(site_url(''));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}