<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicules Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DefectuositesTable&\Cake\ORM\Association\HasMany $Defectuosites
 *
 * @method \App\Model\Entity\Vehicule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiculesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->addBehavior('Translate', ['fields' => ['marque', 'modele']]);
        $this->setTable('vehicules');
        $this->setDisplayField('marque');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsToMany('defectuosites', [
            'foreignKey' => 'vehicule_id',
            'targetForeignKey' => 'defectuosite_id',
            'joinTable' => 'defectuosites_vehicules'
        ]);
        
        $this->belongsToMany('Files', [
            'foreignKey' => 'vehicule_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'files_vehicules'
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
                ->scalar('marque')
                ->minLength('marque', 3)
                ->maxLength('marque', 255)
                ->requirePresence('marque', 'create')
                ->notEmptyString('marque');

        $validator
                ->scalar('modele')
                ->minLength('marque', 3)
                ->maxLength('modele', 255)
                ->requirePresence('modele', 'create')
                ->notEmptyString('modele');

        $validator
                ->scalar('slug')
                ->maxLength('slug', 191)
                ->requirePresence('slug', 'create')
                ->notEmptyString('slug')
                ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        
        $validator = new Validator();
        
        
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
        
        $validator
                ->add('marque', [
                    'minLength' => [
                        'rule' => ['minLength', 3],
                        'last' => true,
                        'message' => 'La marque doit être plus de 3 caractères'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 20],
                        'message' => 'La marque doit être moins de 20 caractères'
                    ]
        ]);
        
        $validator
                ->add('modele', [
                    'minLength' => [
                        'rule' => ['minLength', 3],
                        'last' => true,
                        'message' => 'Le modele doit être plus de 3 caractères'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 20],
                        'message' => 'Le modele doit être moins de 20 caractères'
                    ]
        ]);
        return $validator;
    }

    public function findTagged(Query $query, array $options) {
        $columns = [
            'Vehicules.id', 'Vehicules.user_id', 'Vehicules.marque',
            'Vehicules.modele', 'Vehicules.created', 'Vehicules.slug',
            'Vehicules.slug',
        ];

        $query = $query
                ->select($columns)
                ->distinct($columns);

        if (empty($options['tags'])) {
            // si aucun tag n'est fourni, trouvons les articles qui n'ont pas de tags
            $query->leftJoinWith('Tags')
                    ->where(['Tags.modele IS' => null]);
        } else {
            // Trouvons les articles qui ont au moins un des tags fourni
            $query->innerJoinWith('Tags')
                    ->where(['Tags.modele IN' => $options['tags']]);
        }

        return $query->group(['Vehicules.id']);
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isOwnedBy($vehiculeId, $userId) {
        return $this->exists(['id' => $vehiculeId, 'user_id' => $userId]);
    }

}
