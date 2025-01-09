<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ads Model
 *
 * @method \App\Model\Entity\Ad newEmptyEntity()
 * @method \App\Model\Entity\Ad newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ad> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ad findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ad> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ad saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ad>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ad>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ad>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ad> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ad>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ad>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ad>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ad> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AdsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ads');
        $this->setDisplayField('image');
        $this->setPrimaryKey('id');
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        return $validator;
    }
}
