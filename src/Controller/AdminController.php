<?php
// src/Controller/AdminController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class AdminController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // Cargar el componente de autenticación
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Permitir acceso a las acciones 'login' y 'logout' sin autenticación
        $this->Authentication->allowUnauthenticated(['login', 'logout']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // Si el usuario está autenticado, redirigir al panel de administración
        if ($result->isValid()) {
            return $this->redirect(['action' => 'index']);
        }

        // Mostrar errores si el login falla
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Usuario o contraseña incorrectos.');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }

    public function index()
    {
        // Verificar si el usuario está autenticado
        if (!$this->Authentication->getIdentity()) {
            return $this->redirect(['action' => 'login']);
        }

        // Aquí puedes cargar datos para el panel de administración
        $this->set('title', 'Panel de Administración');
    }
}