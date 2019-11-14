<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Defectuosite Entity
 *
 * @property int $id
 * @property int $vehicule_id
 * @property string $description
 * @property string $slug
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Vehicule $vehicule
 */
class Defectuosite extends Entity
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
        'vehicule_id' => true,
        'description' => true,
        'slug' => true,
        'created' => true,
        'modified' => true,
        'vehicule' => true
    ];
}
