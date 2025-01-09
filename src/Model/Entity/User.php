<?php
// src/Model\Entity/User .php
// src/Model\Entity/User .php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    // Campos accesibles para asignación masiva
    protected array $_accessible = [
        'username' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
    ];

    // Campos que deben ocultarse al serializar la entidad (debe ser un array)
    protected array $_hidden = [
        'password'=>true, // Oculta el campo 'password' al serializar
    ];

    // Método para cifrar la contraseña antes de guardarla en la base de datos
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}