<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Liste;
use App\Repositories\BaseRepository;

/**
 * Class ListeRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 10:58 am UTC
*/

class ListeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'frequence',
        'indication',
        'emplacement'
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
        return Liste::class;
    }
}
