<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Enterprises
 *
 * @method \App\Model\Entity\Offer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Offer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Offer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offer findOrCreate($search, callable $callback = null)
 */
class OffersTable extends Table
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

        $this->table('offers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Enterprises', [
            'foreignKey' => 'enterprise_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->date('publicationBeginningDate')
            ->requirePresence('publicationBeginningDate', 'create')
            ->notEmpty('publicationBeginningDate');

        $validator
            ->date('publicationEndDate')
            ->requirePresence('publicationEndDate', 'create')
            ->notEmpty('publicationEndDate');

        $validator
            ->requirePresence('jobName', 'create')
            ->notEmpty('jobName');

        $validator
            ->date('displayDate')
            ->requirePresence('displayDate', 'create')
            ->notEmpty('displayDate');

        $validator
            ->requirePresence('responsabilitties', 'create')
            ->notEmpty('responsabilitties');

        $validator
            ->requirePresence('aptitudes', 'create')
            ->notEmpty('aptitudes');

        $validator
            ->requirePresence('requirements', 'create')
            ->notEmpty('requirements');

        $validator
            ->requirePresence('strengths', 'create')
            ->notEmpty('strengths');

        $validator
            ->allowEmpty('generalRemark');

        $validator
            ->requirePresence('scholarity', 'create')
            ->notEmpty('scholarity');

        $validator
            ->requirePresence('sector', 'create')
            ->notEmpty('sector');

        $validator
            ->requirePresence('job', 'create')
            ->notEmpty('job');

        $validator
            ->requirePresence('jobType', 'create')
            ->notEmpty('jobType');

        $validator
            ->requirePresence('jobSituation', 'create')
            ->notEmpty('jobSituation');

        $validator
            ->date('jobBeginningDate')
            ->requirePresence('jobBeginningDate', 'create')
            ->notEmpty('jobBeginningDate');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['enterprise_id'], 'Enterprises'));

        return $rules;
    }
}
