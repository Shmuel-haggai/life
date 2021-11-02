<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLienRequest;
use App\Http\Requests\Admin\UpdateLienRequest;
use App\Repositories\Admin\LienRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Lien;
use App\Models\Admin\Liste;
use Illuminate\Http\Request;
use Flash;
use Response;

class LienController extends AppBaseController
{
    /** @var  LienRepository */
    private $lienRepository;

    public function __construct(LienRepository $lienRepo)
    {
        $this->lienRepository = $lienRepo;
    }

    /**
     * Display a listing of the Lien.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $liens = $this->lienRepository->all();

        return view('liens.index')
            ->with('liens', $liens);
    }

    /**
     * Show the form for creating a new Lien.
     *
     * @return Response
     */
    public function create()
    {
        $listes = Liste::pluck('nom', 'id');
        return view('liens.create',compact('listes'));
    }

    /**
     * Store a newly created Lien in storage.
     *
     * @param CreateLienRequest $request
     *
     * @return Response
     */
    public function store(CreateLienRequest $request)
    {
        $input = $request->all();

        if( isset($input['all_listes']) ){

            $listes = Liste::all();

            foreach($listes as $liste){
                Lien::create([
                    'liste_id' => $liste->id,
                    'url' => $input['url'],
                    'nom' => $input['nom'],
                ]);
            }

            Flash::success('Lien saved successfully.');

            return redirect(route('admin.liens.index'));
        }



        $lien = $this->lienRepository->create($input);

        Flash::success('Lien saved successfully.');

        return redirect(route('admin.liens.index'));
    }

    /**
     * Display the specified Lien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lien = $this->lienRepository->find($id);

        if (empty($lien)) {
            Flash::error('Lien not found');

            return redirect(route('admin.liens.index'));
        }

        return view('liens.show')->with('lien', $lien);
    }

    /**
     * Show the form for editing the specified Lien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lien = $this->lienRepository->find($id);



        if (empty($lien)) {
            Flash::error('Lien not found');

            return redirect(route('admin.liens.index'));
        }

        $listes = Liste::pluck('nom', 'id');

        return view('liens.edit', compact('lien', 'listes'));
    }

    /**
     * Update the specified Lien in storage.
     *
     * @param int $id
     * @param UpdateLienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLienRequest $request)
    {
        $lien = $this->lienRepository->find($id);

        if (empty($lien)) {
            Flash::error('Lien not found');

            return redirect(route('admin.liens.index'));
        }

        $lien = $this->lienRepository->update($request->all(), $id);

        Flash::success('Lien updated successfully.');

        return redirect(route('admin.liens.index'));
    }

    /**
     * Remove the specified Lien from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lien = $this->lienRepository->find($id);

        if (empty($lien)) {
            Flash::error('Lien not found');

            return redirect(route('admin.liens.index'));
        }

        $this->lienRepository->delete($id);

        Flash::success('Lien deleted successfully.');

        return redirect(route('admin.liens.index'));
    }
}
