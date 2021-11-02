<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PersonneDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePersonneRequest;
use App\Http\Requests\Admin\UpdatePersonneRequest;
use App\Repositories\Admin\PersonneRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonneController extends AppBaseController
{
    /** @var  PersonneRepository */
    private $personneRepository;

    public function __construct(PersonneRepository $personneRepo)
    {
        $this->personneRepository = $personneRepo;
    }

    /**
     * Display a listing of the Personne.
     *
     * @param PersonneDataTable $personneDataTable
     * @return Response
     */
    public function index(PersonneDataTable $personneDataTable)
    {
        return $personneDataTable->render('personnes.index');
    }

    /**
     * Show the form for creating a new Personne.
     *
     * @return Response
     */
    public function create()
    {
        return view('personnes.create');
    }

    /**
     * Store a newly created Personne in storage.
     *
     * @param CreatePersonneRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonneRequest $request)
    {
        $input = $request->all();

        $personne = $this->personneRepository->create($input);

        Flash::success('Personne saved successfully.');

        return redirect(route('admin.personnes.index'));
    }

    /**
     * Display the specified Personne.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('admin.personnes.index'));
        }

        return view('personnes.show')->with('personne', $personne);
    }

    /**
     * Show the form for editing the specified Personne.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('admin.personnes.index'));
        }

        return view('personnes.edit')->with('personne', $personne);
    }

    /**
     * Update the specified Personne in storage.
     *
     * @param  int              $id
     * @param UpdatePersonneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonneRequest $request)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('admin.personnes.index'));
        }

        $personne = $this->personneRepository->update($request->all(), $id);

        Flash::success('Personne updated successfully.');

        return redirect(route('admin.personnes.index'));
    }

    /**
     * Remove the specified Personne from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('admin.personnes.index'));
        }

        $this->personneRepository->delete($id);

        Flash::success('Personne deleted successfully.');

        return redirect(route('admin.personnes.index'));
    }
}
