<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publishers Model
 *
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\HasMany $Books
 *
 * @method \App\Model\Entity\Publisher newEmptyEntity()
 * @method \App\Model\Entity\Publisher newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Publisher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publisher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publisher findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Publisher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publisher saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publisher[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Publisher[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Publisher[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Publisher[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PublishersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('publishers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Books', [
            'foreignKey' => 'publisher_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmptyString('phone');

        return $validator;
    }
}
