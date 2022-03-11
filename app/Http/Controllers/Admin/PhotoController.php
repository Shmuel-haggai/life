<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Response;
use App\Models\Admin\Liste;
use Illuminate\Http\Request;
use App\DataTables\Admin\PhotoDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\PhotoRepository;
use App\Http\Requests\Admin\CreatePhotoRequest;
use App\Http\Requests\Admin\UpdatePhotoRequest;

class PhotoController extends AppBaseController
{
    /** @var  PhotoRepository */
    private $photoRepository;

    public function __construct(PhotoRepository $photoRepo)
    {
        $this->photoRepository = $photoRepo;
    }

    /**
     * Display a listing of the Photo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(PhotoDataTable $PhotoDataTable)
    {
        $photos = $this->photoRepository->all();

        return view('photos.index')
            ->with('photos', $photos);
        
        //return $PhotoDataTable->render('photos.index');
    }

    /**
     * Show the form for creating a new Photo.
     *
     * @return Response
     */
    public function create()
    {
        $listes = Liste::pluck('nom', 'id');
        return view('photos.create', compact('listes'));
    }

    /**
     * Store a newly created Photo in storage.
     *
     * @param CreatePhotoRequest $request
     *
     * @return Response
     */
    public function store(CreatePhotoRequest $request)
    {
        $input = $request->all();

        $photo = $this->photoRepository->createPhoto($request);

        Flash::success('Photo saved successfully.');

        return redirect(route('admin.photos.index'));
    }

    /**
     * Display the specified Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('admin.photos.index'));
        }

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('admin.photos.index'));
        }

        $listes = Liste::pluck('nom', 'id');

        return view('photos.edit', compact('photo', 'listes'));
    }

    /**
     * Update the specified Photo in storage.
     *
     * @param int $id
     * @param UpdatePhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotoRequest $request)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('admin.photos.index'));
        }

        $photo = $this->photoRepository->update($request->all(), $id);

        Flash::success('Photo updated successfully.');

        return redirect(route('admin.photos.index'));
    }

    /**
     * Remove the specified Photo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('admin.photos.index'));
        }

        $this->photoRepository->delete($id);

        Flash::success('Photo deleted successfully.');

        return redirect(route('admin.photos.index'));
    }
}
