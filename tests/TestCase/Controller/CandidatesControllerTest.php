<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CandidatesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;


/**
 * App\Controller\CandidatesController Test Case
 */
class CandidatesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidates'
    ];

    public function setUp() {
        parent::setUp();
        $this->Candidates = TableRegistry::get('Candidates');
    }
    
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $total = $this->Candidates->find()->count();
        $this->assertEquals(1, $total);
        
        $data = ['FirstName' => 'Jean', 'LastName' => 'LeMaigre', 'Address' => '55 rue allo'];
        $candidate = $this->Candidates->newEntity($data);
        $this->Candidates->save($candidate);
        $newTotal = $this->Candidates->find()->count();
        $this->assertEquals(2, $newTotal);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
