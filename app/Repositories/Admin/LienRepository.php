<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Lien;
use App\Repositories\BaseRepository;

/**
 * Class LienRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 8:28 am UTC
*/

class LienRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'nom',
        'liste_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lien::class;
    }
}
