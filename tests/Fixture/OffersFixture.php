<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OffersFixture
 *
 */
class OffersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'publicationBeginningDate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'publicationEndDate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'jobName' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'displayDate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'responsabilitties' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aptitudes' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'requirements' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'strengths' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'generalRemark' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'scholarity' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sector' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'job' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'jobType' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'jobSituation' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'jobBeginningDate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'enterprise_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'enterprise_key' => ['type' => 'index', 'columns' => ['enterprise_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'enterprise_key' => ['type' => 'foreign', 'columns' => ['enterprise_id'], 'references' => ['enterprises', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Offre 1',
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
            'enterprise_id' => 1
        ],
        [
            'id' => 2,
            'name' => 'Offre 2',
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
            'enterprise_id' => 1
        ],
        [
            'id' => 3,
            'name' => 'Autre',
            'description' => 'Lorem ipsum dolor sit amet',
            'publicationBeginningDate' => '2016-09-09',
            'publicationEndDate' => '2016-09-09',
            'jobName' => 'Informatique',
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
            'enterprise_id' => 1
        ],
    ];
}
