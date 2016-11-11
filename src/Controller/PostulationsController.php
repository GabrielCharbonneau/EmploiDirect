<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Postulations Controller
 *
 * @property \App\Model\Table\PostulationsTable $Postulations
 */
class PostulationsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $postulations = $this->paginate($this->Postulations);

        $this->set(compact('postulations'));
        $this->set('_serialize', ['postulations']);
    }

    public function historique($id) {
        $postulations = $this->paginate($this->Postulations);

        $this->loadModel('Candidates');
        $candidateProfile = $this->Candidates->find('all', ['conditions' => ['user_id' => $this->Auth->User('id')]])->first();
        if ($candidateProfile) {
            $this->set('postulations2', $this->Postulations->find('all', ['conditions' => ['idCandidate' => $candidateProfile['id']]]));
        }
        $this->set(compact('postulations'));
        $this->set('_serialize', ['postulations']);
    }

    /**
     * View method
     *
     * @param string|null $id Postulation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $postulation = $this->Postulations->get($id, [
            'contain' => ['Files']
        ]);

        $this->set('postulation', $postulation);
        $this->set('_serialize', ['postulation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id) {
        $postulation = $this->Postulations->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Files');
            if (!empty($this->request->data['file']['name'])) {
                $fileName = $this->request->data['file']['name'];

                // Chemin Pour Le Serveur
                $uploadPath = 'c:\\home\\site\\wwwroot\\webroot\\img\\uploads\\files\\';
                $uploadFile = $uploadPath.$fileName;
                
                
                // LOCAL SEULEMENT
                // $uploadPath = 'uploads/files/';
                // $uploadFile = 'img/' . $uploadPath . $fileName;

                if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadFile)) {
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file to server, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }



            $postulation = $this->Postulations->patchEntity($postulation, $this->request->data);
            $this->loadModel('Candidates');
            $candidate = $this->Candidates->find('all', ['conditions' => ['user_id' => $this->Auth->User('id')]])->first();
            $postulation->idCandidate = $candidate['id'];
            ;
            $postulation->idOffer = $id;
            $postulation->DatePostulation = Date('Y-m-d');
            if ($this->Postulations->save($postulation)) {
                $this->Flash->success(__('The postulation has been saved.'));
                return $this->redirect(['controller' => 'offers', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The postulation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('postulation'));
        $this->set('_serialize', ['postulation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Postulation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $postulation = $this->Postulations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postulation = $this->Postulations->patchEntity($postulation, $this->request->data);
            if ($this->Postulations->save($postulation)) {
                $this->Flash->success(__('The postulation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The postulation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('postulation'));
        $this->set('_serialize', ['postulation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Postulation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $postulation = $this->Postulations->get($id);
        if ($this->Postulations->delete($postulation)) {
            $this->Flash->success(__('The postulation has been deleted.'));
        } else {
            $this->Flash->error(__('The postulation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->action;

        if ($user && $user['role'] === 'enterprise') {
            if ($action === 'add') {
                $this->Flash->error(__('Only candidates can postulate.'));
                return false;
            }
            if ($action === 'view') {
               
                $this->loadModel('Enterprises');
                $this->loadModel('Offers');

                $enterprise = $this->Enterprises->find('all', ['conditions' => ['user_id' => $this->Auth->User('id')]])->first();
                $offers = $this->Offers->find('all', ['conditions' => ['enterprise_id' => $enterprise['id']]])->toArray();

                $id = (int) $this->request->params['pass'][0];

                $postulation = $this->Postulations->find('all', ['conditions' => ['id' => $id]])->first();

                foreach ($offers as $offer) {
                    if ($postulation['idOffer'] === $offer['id']) {
                        return true;
                    }
                }
            }
        }

        if ($user && $user['role'] === 'candidate') {
            if ($action === 'add') {
                $this->loadModel('Candidates');
                $candidateProfile = $this->Candidates->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])->first();
                if (!$candidateProfile) {
                    $this->Flash->error(__('You need to complete your profile first.'));
                    return $this->redirect(['controller' => 'Candidates', 'action' => 'add']);
                }
                return true;
            }
            if ($action === 'historique' || $action === 'view') {
                $this->loadModel('Candidates');
                $candidateProfile = $this->Candidates->find('all', ['conditions' => ['user_id' => $this->Auth->User('id')]])->first();
                if ($candidateProfile) {
                    $this->set('postulations2', $this->Postulations->find('all', ['conditions' => ['idCandidate' => $candidateProfile['id']]]));
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }

}
