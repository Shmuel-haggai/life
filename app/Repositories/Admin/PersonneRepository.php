<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Personne;
use App\Repositories\BaseRepository;

/**
 * Class PersonneRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 10:44 am UTC
*/

class PersonneRepository extends BaseRepository
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
        return Personne::class;
    }
}
