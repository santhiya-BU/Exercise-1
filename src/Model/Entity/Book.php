<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $title
 * @property int|null $publisher_id
 * @property int|null $author_id
 * @property \Cake\I18n\FrozenDate|null $published_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Publisher $publisher
 * @property \App\Model\Entity\Author $author
 */
class Book extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'publisher_id' => true,
        'author_id' => true,
        'published_date' => true,
        'created' => true,
        'modified' => true,
        'publisher' => true,
        'author' => true,
    ];
}
