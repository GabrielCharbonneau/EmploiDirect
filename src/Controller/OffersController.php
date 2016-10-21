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
            'contain' => ['Enterprises', 'Postulations']
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
            $this->loadModel('Enterprises');
            $offer->enterprise_id = $this->Enterprises->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])->first()['id'];
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
        if ($user && $user['role'] === 'enterprise' && ($this->request->action === 'add' || $this->request->action === 'research' || $this->request->action === 'search')) {
            return true;
        }
        
        $this->loadModel('Enterprises');
        $ent = $this->Enterprises->find('all', ["conditions" => ['user_id' => $user['id']]])->first();
	$id = $this->request->params['pass'][0];
	$offer = $this->Offers->get($id);
        if ($user && $user['role'] === 'enterprise' && $ent['id'] === $offer->enterprise_id) {
            return true;
        }
        
        if($user && $user['role'] === 'candidate') {
            return false;
        }
        if($user && $this->request->action === 'view') {
            return true;
        }
        
        return parent::isAuthorized($user);
    }

    public function search($offer)
    {
        
        $this->paginate = [
            'contain' => ['Enterprises']
        ];
        if(isset($offer['name']))
        {
            $conditions[] = array('Offers.name Like' =>'%' . $offer['name'] . '%');
        }
        if(isset($offer['job']))
        {
            $conditions[] = array('Offers.job Like' =>'%'.$offer['job'].'%');
        }
        if(isset($offer['jobSituation']))
        {
            $conditions[] = array('Offers.jobSituation Like' =>'%'.$offer['jobSituation'].'%');
        }
        if(isset($offer['jobName']))
        {
            $conditions[] = array('Offers.jobName Like' =>'%'.$offer['jobName'].'%');
        }
        if(isset($offer['description']))
        {
            $conditions[] = array('Offers.description Like' =>'%'.$offer['description'].'%');
        }
        if(isset($offer['sector']))
        {
            $conditions[] = array('Offers.sector Like' =>'%'.$offer['sector'].'%');
        }
        
        if(isset($conditions))
        {
            return $this->paginate('Offers', array('conditions' => array('AND' => $conditions)));
        }
        else 
        {
            return $this->paginate($this->Offers);
        }
    }
    
    public function research()
    {
        if ($this->request->is('post')) {
            $offers=$this->search($this->request->data);
            
            $this->set(compact('offers'));
            $this->set('_serialize', ['offers']);
        }
    }
}
