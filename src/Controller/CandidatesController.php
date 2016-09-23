<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 */
class CandidatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $candidates = $this->paginate($this->Candidates);
        
        $this->set(compact('candidates'));
        $this->set('_serialize', ['candidates']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);

        $this->set('candidate', $candidate);
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            // Ajoute le id user
            $candidate->user_id = $this->Auth->user('id');
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['controller' => 'offers', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Your profile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user) {        
        $action = $this->request->action;
        
        if ($user && $user['role'] === 'candidate') {
            if($action === 'add') {
                $this->loadModel('Candidates');
                $candidate = $this->Candidates->find('all', ['conditions' => ['user_id' => $user['id']]])->first();
                if($candidate) {
                    $this->Flash->error(__('You already have a profile'));
                    return false;
                }
                return true;
            }
        }
        
        if($user && $user['role'] === 'enterprise') {
            if($action === 'view') {
                return true;
            }
            if($action === 'add') {
                $this->Flash->error(__('You can\'t create a candidate profile on an enterprise account.'));
                return false;
            }
            if($action === 'edit') {
                $this->Flash->error(__('You can\'t edit a candidate profile on an enterprise account.'));
                return false;
            }
            if($action === 'index') {
                return true;
            }
        }



        parent::isAuthorized($user);
    }
}
