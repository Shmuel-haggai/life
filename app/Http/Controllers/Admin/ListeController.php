<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Response;
use App\Models\emplacement;
use App\Http\Requests\Admin;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\DataTables\Admin\ListeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ListeRepository;
use App\Http\Requests\Admin\CreateListeRequest;
use App\Http\Requests\Admin\UpdateListeRequest;

class ListeController extends AppBaseController
{
    /** @var  ListeRepository */
    private $listeRepository;

    public function __construct(ListeRepository $listeRepo)
    {
        $this->listeRepository = $listeRepo;
    }

    /**
     * Display a listing of the Liste.
     *
     * @param ListeDataTable $listeDataTable
     * @return Response
     */

    public function index(ListeDataTable $listeDataTable)
    {
        $dataemplacement = emplacement::all();
        return $listeDataTable->render('listes.index', ['dataemplacement' => $dataemplacement]);
    }

    /**
     * Show the form for creating a new Liste.
     *
     * @return Response
     */
    public function create()
    {
        return view('listes.create');
    }

    /**
     * Store a newly created Liste in storage.
     *
     * @param CreateListeRequest $request
     *
     * @return Response
     */
    public function store(CreateListeRequest $request)
    {
        $input = $request->all();
                
        $emplacement = emplacement::create([
            'nom_emplacement' => $input['emplacement'],
        ]);

        $singleemplacement = $emplacement->toArray();
        $input['emplacement_id'] = $singleemplacement['id'];

        $liste = $this->listeRepository->create($input);

        Flash::success('Liste saved successfully.');

        return redirect(route('admin.listes.index'));
    }

    /**
     * Display the specified Liste.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(ListeDataTable $listeDataTable, $id)
    {

        $dataemplacement = emplacement::all();

        $liste = $this->listeRepository->find($id);

        if (empty($liste)) {
            Flash::error('Liste not found');

            return redirect(route('admin.listes.index'));
        }

        return $listeDataTable->render('listes.index', compact('liste'), ['dataemplacement' => $dataemplacement]);

        //return view('listes.show')->with('liste', $liste);
    }

    /**
     * Show the form for editing the specified Liste.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $liste = $this->listeRepository->find($id);

        if (empty($liste)) {
            Flash::error('Liste not found');

            return redirect(route('admin.listes.index'));
        }
        return view('listes.edit')->with('liste', $liste);
    }

    /**
     * Update the specified Liste in storage.
     *
     * @param  int              $id
     * @param UpdateListeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateListeRequest $request)
    {
        $liste = $this->listeRepository->find($id);

        if (empty($liste)) {
            Flash::error('Liste not found');

            return redirect(route('admin.listes.index'));
        }

        $liste = $this->listeRepository->update($request->all(), $id);

        Flash::success('Liste updated successfully.');

        return redirect(route('admin.listes.index'));
    }

    /**
     * Remove the specified Liste from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $liste = $this->listeRepository->find($id);

        if (empty($liste)) {
            Flash::error('Liste not found');

            return redirect(route('admin.listes.index'));
        }

        $this->listeRepository->delete($id);

        Flash::success('Liste deleted successfully.');

        return redirect(route('admin.listes.index'));
    }
}
