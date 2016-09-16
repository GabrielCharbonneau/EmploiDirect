<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\Time $publicationBeginningDate
 * @property \Cake\I18n\Time $publicationEndDate
 * @property string $jobName
 * @property \Cake\I18n\Time $displayDate
 * @property string $responsabilitties
 * @property string $aptitudes
 * @property string $requirements
 * @property string $strengths
 * @property string $generalRemark
 * @property string $scholarity
 * @property string $sector
 * @property string $job
 * @property string $jobType
 * @property string $jobSituation
 * @property \Cake\I18n\Time $jobBeginningDate
 * @property int $enterprise_id
 *
 * @property \App\Model\Entity\Enterprise $enterprise
 */
class Offer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
