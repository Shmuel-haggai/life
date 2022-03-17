<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\CreatePhotoRequest;
use App\Models\Admin\Photo;
use App\Repositories\BaseRepository;
use Image;

/**
 * Class PhotoRepository
 * @package App\Repositories\Admin
 * @version November 2, 2021, 8:09 am UTC
*/

class PhotoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
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
        return Photo::class;
    }

    public function createPhoto(CreatePhotoRequest $request){
        $file = $request->file('url');
        $original_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $path = 'photos/' . uniqid() . '.' .$extension;
        $img = Image::make($file);
        $img->save(public_path($path));

        $input = $request->all();
        $input['url'] = $path;

        return $this->create($input);
    }
}
