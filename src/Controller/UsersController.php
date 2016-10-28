<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Enterprises']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function createEnterpriseAccount() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role = 'enterprise';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your account has been created.'));
                $this->Auth->setUser($user);
                
                $this->sendConfirmationEmail('an enterprise');
                
                return $this->redirect(['controller' => 'Enterprises', 'action' => 'add']);
            } else {
                $this->Flash->error(__('Your account could not be created. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function createCandidateAccount() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role = 'candidate';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your account has been created.'));
                $this->Auth->setUser($user);
                
                $this->sendConfirmationEmail('a candidate');
                
                return $this->redirect(['controller' => 'Candidates', 'action' => 'add']);
            } else {
                $this->Flash->error(__('Your account could not be created. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function sendConfirmationEmail($role) {
        /*
        $email = new Email();
        $email->to($user['email']);
        $email->from(['noreply@emploidirect.ca' => 'Emploi Direct']);
        $email->subject('Your account has been created');
        $email->send('Your account has successfully been created. You can now fully use www.emploidirect.ca as ' . $role . '.');
        */
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Your account has been created.'));
        } else {
            $this->Flash->error(__('Your account could not be created. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function deactivate($id = null) {
        $user = $this->Users->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user['active'] = 0;
            $this->Users->save($user);
            Debug($this->request->data);die;
            /*
            $email = new Email();
            $email->to($user['email']);
            $email->from(['noreply@emploidirect.ca' => 'Emploi Direct']);
            $email->subject('Your account has been disabled');
            $email->send('Your account has been disabled for the following reason : ' . $this->request->data['reason']);
            */
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set('user', $user);

    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['createCandidateAccount', 'createEnterpriseAccount', 'logout']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if($user['active']) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Your account has been disabled. Please check your email for more informations.'));
                }
            } else {
                $this->Flash->error(__('Invalid email or password, try again'));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function isAuthorized($user) {
        // Admin can access everything
        if(isset($user['role']) && $user['role'] == 'admin') {
            return true;
        }
        
        parent::isAuthorized($user);
    }

}
