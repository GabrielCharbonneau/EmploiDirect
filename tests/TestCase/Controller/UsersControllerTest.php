<?php

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.enterprises'
    ];

    public function setUp() {
        parent::setUp();
        $this->Users = TableRegistry::get('Users');
    }

    public function testSaving() {
        $total = $this->Users->find()->count();
        $this->assertEquals(1, $total);

        $data = ['email' => 'p@p.com', 'password' => 'p', 'role' => 'admin'];
        $user = $this->Users->newEntity($data);
        $this->Users->save($user);
        $newTotal = $this->Users->find()->count();
        $this->assertEquals(2, $newTotal);
    }
    
    public function testEmail() {
        $cont = new UsersController();
        $true = $cont->sendConfirmationEmail('cyrd97@gmail.com', 'a candidate');
        $this->assertTrue($true);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
