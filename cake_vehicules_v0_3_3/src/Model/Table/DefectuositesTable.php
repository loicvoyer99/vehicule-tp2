<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Defectuosites Model
 *
 * @property \App\Model\Table\VehiculesTable&\Cake\ORM\Association\BelongsTo $Vehicules
 *
 * @method \App\Model\Entity\Defectuosite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Defectuosite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Defectuosite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Defectuosite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defectuosite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defectuosite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Defectuosite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Defectuosite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefectuositesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('defectuosites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', ['fields' => ['description']]);
        
        $this->belongsToMany('Vehicules', [
            'foreignKey' => 'defectuosite_id',
            'targetForeignKey' => 'vehicule_id',
            'joinTable' => 'defectuosites_vehicules'
        ]);

        $this->hasMany('Subdefectuosites', [
            'foreignKey' => 'defectuosite_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('description')
                ->maxLength('description', 255)
                ->minLength('description', 5)
                ->requirePresence('description', 'create')
                ->notEmptyString('description');

        $validator
                ->scalar('slug')
                ->maxLength('slug', 191)
                ->requirePresence('slug', 'create')
                ->notEmptyString('slug')
                ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator = new Validator();

        // defectuosites
        $validator
                ->add('description', [
                    'minLength' => [
                        'rule' => ['minLength', 5],
                        'last' => true,
                        'message' => 'La description doit être plus de 5 caractères'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 250],
                        'message' => 'La description doit être moins de 255 caractères'
                    ]
        ]);
        
        $validator
                ->add('slug', [
                    'minLength' => [
                        'rule' => ['minLength', 3],
                        'last' => true,
                        'message' => 'Le slug doit être plus de 3 caractères'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 30],
                        'message' => 'Le slug doit être moins de caractères'
                    ]
        ]);
        
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['slug']));
        $rules->add($rules->existsIn(['vehicule_id'], 'Vehicules'));

        return $rules;
    }

}
