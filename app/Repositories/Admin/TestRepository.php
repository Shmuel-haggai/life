<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Test;
use App\Repositories\BaseRepository;

/**
 * Class TestRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 10:34 am UTC
*/

class TestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Test::class;
    }
}
