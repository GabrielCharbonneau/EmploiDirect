<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Offers Controller
 *
 * @property \App\Model\Table\OffersTable $Offers
 */
class OffersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Enterprises']
        ];
        $offers = $this->paginate($this->Offers);

        $this->set(compact('offers'));
        $this->set('_serialize', ['offers']);
    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $offer = $this->Offers->get($id, [
            'contain' => ['Enterprises']
        ]);

        $this->set('offer', $offer);
        $this->set('_serialize', ['offer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $offer = $this->Offers->newEntity();
        if ($this->request->is('post')) {
            $offer = $this->Offers->patchEntity($offer, $this->request->data);
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offer could not be saved. Please, try again.'));
            }
        }
        $enterprises = $this->Offers->Enterprises->find('list', ['limit' => 200]);
        $this->set(compact('offer', 'enterprises'));
        $this->set('_serialize', ['offer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $offer = $this->Offers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offer = $this->Offers->patchEntity($offer, $this->request->data);
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offer could not be saved. Please, try again.'));
            }
        }
        $enterprises = $this->Offers->Enterprises->find('list', ['limit' => 200]);
        $this->set(compact('offer', 'enterprises'));
        $this->set('_serialize', ['offer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $offer = $this->Offers->get($id);
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['index', 'view']);
    }

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        
        if ($user && $user['role'] === 'enterprise' && $this->request->action === 'add') {
            return true;
        } else {
            $this->Flash->error(__('Only enterprises can add offers.'));
        }
        
        if($user && $this->request->action === 'view') {
            return true;
        }

        parent::isAuthorized($user);
    }

}
