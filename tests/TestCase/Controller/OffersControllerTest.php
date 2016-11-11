<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OffersController;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\OffersController Test Case
 */
class OffersControllerTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offers',
        'app.enterprises'
    ];
    
      public function setUp() {
        parent::setUp();
        $this->Offers = TableRegistry::get('Offers');
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
        $total = $this->Offers->find()->count();
        $this->assertEquals(3, $total);
        
        $data = [
            'name' => 'Offre 4',
            'description' => 'Lorem ipsum dolor sit amet',
            'publicationBeginningDate' => '2016-09-09',
            'publicationEndDate' => '2016-09-09',
            'jobName' => 'Lorem ipsum dolor sit amet',
            'displayDate' => '2016-09-09',
            'responsabilitties' => 'Lorem ipsum dolor sit amet',
            'aptitudes' => 'Lorem ipsum dolor sit amet',
            'requirements' => 'Lorem ipsum dolor sit amet',
            'strengths' => 'Lorem ipsum dolor sit amet',
            'generalRemark' => 'Lorem ipsum dolor sit amet',
            'scholarity' => 'Lorem ipsum dolor sit amet',
            'sector' => 'Lorem ipsum dolor sit amet',
            'job' => 'Lorem ipsum dolor sit amet',
            'jobType' => 'Lorem ipsum dolor sit amet',
            'jobSituation' => 'Lorem ipsum dolor sit amet',
            'jobBeginningDate' => '2016-09-09',
            'enterprise_id' => 1];
        $offer = $this->Offers->newEntity($data);
        $this->Offers->save($offer);
        $newTotal = $this->Offers->find()->count();
        $this->assertEquals(4, $newTotal);
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
    
    /**
     * Test search method
     *
     * @return void
     */
    public function testResearch()
    {
        $offer = $this->Offers->newEntity();
        $offer = 
        [
            'name' => 'Offre 1',
            'jobName' => 'Lorem ipsum dolor sit amet',
            'sector' => 'Lorem ipsum dolor sit amet',
            'job' => 'Lorem ipsum dolor sit amet',
            'jobType' => 'Lorem ipsum dolor sit amet',
            'jobSituation' => 'Lorem ipsum dolor sit amet'
        ];
        $controleur = new OffersController();
        $offers = $controleur->search($offer);
        $actualObj= $offers->first();
        $actual= $actualObj->name;
        
        $this->assertEquals("Offre 1", $actual);
        
        $offerDeux = $this->Offers->newEntity();
        $offerDeux = [
            'name' => 'Offre 2',
            'jobName' => 'Lorem ipsum dolor sit amet',
            'sector' => 'Lorem ipsum dolor sit amet',
            'job' => 'Lorem ipsum dolor sit amet',
            'jobType' => 'Lorem ipsum dolor sit amet',
            'jobSituation' => 'Lorem ipsum dolor sit amet'
        ];
        $offersDeux = $controleur->search($offerDeux);
        $actualObjDeux= $offersDeux->first();
        $actualDeux= $actualObjDeux->name;
        
        $this->assertEquals("Offre 2", $actualDeux);
        
        $offerJN = $this->Offers->newEntity();
        $offerJN = [
            'name' => 'Autre',
            'jobName' => 'Informatique',
            'sector' => 'Lorem ipsum dolor sit amet',
            'job' => 'Lorem ipsum dolor sit amet',
            'jobType' => 'Lorem ipsum dolor sit amet',
            'jobSituation' => 'Lorem ipsum dolor sit amet'
        ];
        $controleur = new OffersController();
        $off = $controleur->search($offerJN);
        $actualObjJN= $off->first();
        $actualJN= $actualObjJN->name;
        
        $this->assertEquals("Autre", $actualJN);
        
    }
}
