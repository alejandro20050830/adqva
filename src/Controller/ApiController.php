<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
use AppControllerAppController;
use CakeHttpExceptionNotFoundException;
use Cake\ORM\TableRegistry;
/**
 * Api Controller
 *
 */
class ApiController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Permitir el acceso a la API desde cualquier origen (CORS)
        $this->response = $this->response->withHeader('Access-Control-Allow-Origin', '*');
        $this->response = $this->response->withHeader('Content-Type', 'application/json');

        
    }

    public function index()
    {   
        $Ads = TableRegistry::getTableLocator()->get('Ads');
        $ads = $Ads->find('all', [
            'fields' => ['id', 'image', 'link', 'description'] // Asegúrate de incluir los campos necesarios
        ]);
    
        $adsArray = $ads->toArray();
        
        // Agregar la URL completa de la imagen
        foreach ($adsArray as &$ad) {
            $ad['image_url'] = Router::url('/' . $ad['image'], true); // Ajusta la ruta según sea necesario
        }
    
        // Devolver los datos como JSON
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($adsArray));
    }
    
}
