<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Enterprises Controller
 *
 * @property \App\Model\Table\EnterprisesTable $Enterprises
 */
class EnterprisesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $enterprises = $this->paginate($this->Enterprises);

        $this->set(compact('enterprises'));
        $this->set('_serialize', ['enterprises']);
    }

    /**
     * View method
     *
     * @param string|null $id Enterprise id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $enterprise = $this->Enterprises->get($id, [
            'contain' => ['Offers']
        ]);

        $this->set('enterprise', $enterprise);
        $this->set('_serialize', ['enterprise']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $enterprise = $this->Enterprises->newEntity();
        if ($this->request->is('post')) {
            $enterprise = $this->Enterprises->patchEntity($enterprise, $this->request->data);
            $enterprise->user_id = $this->Auth->user('id');
            if ($this->Enterprises->save($enterprise)) {
                $this->Flash->success(__('The enterprise has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The enterprise could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('enterprise'));
        $this->set('_serialize', ['enterprise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Enterprise id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $enterprise = $this->Enterprises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enterprise = $this->Enterprises->patchEntity($enterprise, $this->request->data);
            if ($this->Enterprises->save($enterprise)) {
                $this->Flash->success(__('The enterprise has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The enterprise could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('enterprise'));
        $this->set('_serialize', ['enterprise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Enterprise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $enterprise = $this->Enterprises->get($id);
        if ($this->Enterprises->delete($enterprise)) {
            $this->Flash->success(__('The enterprise has been deleted.'));
        } else {
            $this->Flash->error(__('The enterprise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        
        $action = $this->request->action;
        
        if ($user && $user['role'] === 'enterprise') {
            if($action === 'add') {
                $this->loadModel('Enterprises');
                $enterprise = $this->Enterprises->find('all', ['conditions' => ['user_id' => $user['id']]])->first();
                if($enterprise) {
                    $this->Flash->error(__('You already have a profile'));
                    return false;
                }
                return true;
            }
        }
        if($user && $user['role'] === 'candidate') {
            if($action === 'view' || $action === 'index') {
                return true;
            }
            if($action === 'add') {
                $this->Flash->error(__('You can\'t create an enterprise profile on a candidate account.'));
                return false;
            }
            if($action === 'edit') {
                $this->Flash->error(__('You can\'t edit an enterprise profile on a candidate account.'));
                return false;
            }
        }



        return parent::isAuthorized($user);
    }

}
