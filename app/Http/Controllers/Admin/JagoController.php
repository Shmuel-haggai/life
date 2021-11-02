<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\JagoDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateJagoRequest;
use App\Http\Requests\Admin\UpdateJagoRequest;
use App\Repositories\Admin\JagoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JagoController extends AppBaseController
{
    /** @var  JagoRepository */
    private $jagoRepository;

    public function __construct(JagoRepository $jagoRepo)
    {
        $this->jagoRepository = $jagoRepo;
    }

    /**
     * Display a listing of the Jago.
     *
     * @param JagoDataTable $jagoDataTable
     * @return Response
     */
    public function index(JagoDataTable $jagoDataTable)
    {
        return $jagoDataTable->render('jagos.index');
    }

    /**
     * Show the form for creating a new Jago.
     *
     * @return Response
     */
    public function create()
    {
        return view('jagos.create');
    }

    /**
     * Store a newly created Jago in storage.
     *
     * @param CreateJagoRequest $request
     *
     * @return Response
     */
    public function store(CreateJagoRequest $request)
    {
        $input = $request->all();

        $jago = $this->jagoRepository->create($input);

        Flash::success('Jago saved successfully.');

        return redirect(route('admin.jagos.index'));
    }

    /**
     * Display the specified Jago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jago = $this->jagoRepository->find($id);

        if (empty($jago)) {
            Flash::error('Jago not found');

            return redirect(route('admin.jagos.index'));
        }

        return view('jagos.show')->with('jago', $jago);
    }

    /**
     * Show the form for editing the specified Jago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jago = $this->jagoRepository->find($id);

        if (empty($jago)) {
            Flash::error('Jago not found');

            return redirect(route('admin.jagos.index'));
        }

        return view('jagos.edit')->with('jago', $jago);
    }

    /**
     * Update the specified Jago in storage.
     *
     * @param  int              $id
     * @param UpdateJagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJagoRequest $request)
    {
        $jago = $this->jagoRepository->find($id);

        if (empty($jago)) {
            Flash::error('Jago not found');

            return redirect(route('admin.jagos.index'));
        }

        $jago = $this->jagoRepository->update($request->all(), $id);

        Flash::success('Jago updated successfully.');

        return redirect(route('admin.jagos.index'));
    }

    /**
     * Remove the specified Jago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jago = $this->jagoRepository->find($id);

        if (empty($jago)) {
            Flash::error('Jago not found');

            return redirect(route('admin.jagos.index'));
        }

        $this->jagoRepository->delete($id);

        Flash::success('Jago deleted successfully.');

        return redirect(route('admin.jagos.index'));
    }
}
