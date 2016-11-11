<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EnterprisesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\EnterprisesController Test Case
 */
class EnterprisesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.enterprises',
        'app.offers'
    ];
    
    public function setUp() {
        parent::setUp();
        $this->Enterprises = TableRegistry::get('Enterprises');
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
        $total = $this->Enterprises->find()->count();
        $this->assertEquals(1, $total);

        $data = ['name' => 'Lorem ipsum dolor sit a',
            'description' => 'Lorem ipsum dolor sit amet',];
        $enterprise = $this->Enterprises->newEntity($data);
        $this->Enterprises->save($enterprise);
        $newTotal = $this->Enterprises->find()->count();
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
