<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subdefectuosites Model
 *
 * @property \App\Model\Table\DefectuositesTable&\Cake\ORM\Association\BelongsTo $Defectuosites
 *
 * @method \App\Model\Entity\Subdefectuosite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subdefectuosite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subdefectuosite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subdefectuosite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subdefectuosite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subdefectuosite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subdefectuosite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subdefectuosite findOrCreate($search, callable $callback = null, $options = [])
 */
class SubdefectuositesTable extends Table
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

        $this->setTable('subdefectuosites');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Defectuosites', [
            'foreignKey' => 'defectuosite_id'
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 60)
            ->allowEmptyString('name');

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
        $rules->add($rules->existsIn(['defectuosite_id'], 'Defectuosites'));

        return $rules;
    }
}
