<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Jago;
use App\Repositories\BaseRepository;

/**
 * Class JagoRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 10:38 am UTC
*/

class JagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom'
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
        return Jago::class;
    }
}
