<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Postulations Model
 *
 * @method \App\Model\Entity\Postulation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Postulation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Postulation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Postulation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Postulation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Postulation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Postulation findOrCreate($search, callable $callback = null)
 */
class PostulationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('postulations');
        $this->displayField('id');
        $this->primaryKey('id');
        
        
         $this->hasOne('Candidates');
         $this->hasOne('Files');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('idCandidate')
            ->requirePresence('idCandidate', 'create')
            ->notEmpty('idCandidate');

        $validator
            ->integer('idOffer')
            ->requirePresence('idOffer', 'create')
            ->notEmpty('idOffer');

        $validator
            ->requirePresence('PresentationLetter', 'create')
            ->notEmpty('PresentationLetter');

        return $validator;
    }
}
