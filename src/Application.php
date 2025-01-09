<?php
// src/Application.php
// src/Application.php
namespace App;

use Cake\Http\BaseApplication;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Routing\Middleware\AssetMiddleware;
use Authentication\Middleware\AuthenticationMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Psr\Http\Message\ServerRequestInterface;

class Application extends BaseApplication
{
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            ->add(new RoutingMiddleware($this))
            ->add(new AssetMiddleware())
            ->add(new AuthenticationMiddleware($this->getAuthenticationService()));

        return $middlewareQueue;
    }

    public function getAuthenticationService(): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // Configurar el servicio de autenticación
        $service->setConfig([
            'unauthenticatedRedirect' => '/admin/login',
            'queryParam' => 'redirect',
        ]);

        // Usar autenticación por formulario
        $service->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'username',
                'password' => 'password',
            ],
        ]);

        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'username',
                'password' => 'password',
            ],
            'loginRedirect' => [
                'controller' => 'Admin',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'Admin',
                'action' => 'login',
            ],
        ]);

        return $service;
    }
}