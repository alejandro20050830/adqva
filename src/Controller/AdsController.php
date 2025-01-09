<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Http\Response;
class AdsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->response = $this->response->withHeader('Access-Control-Allow-Origin', '*')
                                         ->withHeader('Access-Control-Allow-Methods', 'GET')
                                         ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    }
    public function api()
    {
        $ads = $this->Ads->find('all');
        foreach ($ads as $ad) {
            $ad->image = Router::url('/uploads/' . basename($ad->image), true);
        }
        $this->set([
            'ads' => $ads,
            '_serialize' => ['ads'],
        ]);
        $this->viewBuilder()->setOption('serialize', ['ads']);
    }



    public function add()
    {
        $ad = $this->Ads->newEmptyEntity();
        if ($this->request->is('post')) {
            $ad = $this->Ads->patchEntity($ad, $this->request->getData());
            $file = $this->request->getData('image');

            if ($file->getError() === UPLOAD_ERR_OK) {
                $uploadPath = 'uploads/';
                $uploadFile = $uploadPath . basename($file->getClientFilename());

                // Crear el directorio si no existe
                if (!is_dir($uploadPath)) {
                    if (!mkdir($uploadPath, 0755, true) && !is_dir($uploadPath)) {
                        throw new RuntimeException(sprintf('Directory "%s" was not created', $uploadPath));
                    }
                }

                // Intentar mover el archivo subido
                try {
                    $file->moveTo($uploadFile);
                    $ad->image = $uploadFile;
                    if ($this->Ads->save($ad)) {
                        $this->Flash->success(__('El anuncio se ha creado correctamente.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('No se pudo crear el anuncio. Por favor, inténtelo de nuevo.'));
                } catch (Exception $e) {
                    $this->Flash->error(__('Error al mover el archivo: ') . $e->getMessage());
                }
            } else {
                $this->Flash->error(__('Error en la subida del archivo.'));
            }
        }
        $this->set(compact('ad'));
    }

    public function index()
    {
        $ads = $this->paginate($this->Ads);
        $this->set(compact('ads'));
    }

    public function view($id = null)
    {
        $ad = $this->Ads->get($id);
        $this->set(compact('ad'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('El anuncio ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el anuncio. Por favor, inténtelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
