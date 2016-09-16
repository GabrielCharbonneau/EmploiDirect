<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Postulations Controller
 *
 * @property \App\Model\Table\PostulationsTable $Postulations
 */
class PostulationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $postulations = $this->paginate($this->Postulations);

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
    public function view($id = null)
    {
        $postulation = $this->Postulations->get($id, [
            'contain' => []
        ]);

        $this->set('postulation', $postulation);
        $this->set('_serialize', ['postulation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postulation = $this->Postulations->newEntity();
        if ($this->request->is('post')) {
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
     * Edit method
     *
     * @param string|null $id Postulation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postulation = $this->Postulations->get($id);
        if ($this->Postulations->delete($postulation)) {
            $this->Flash->success(__('The postulation has been deleted.'));
        } else {
            $this->Flash->error(__('The postulation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
