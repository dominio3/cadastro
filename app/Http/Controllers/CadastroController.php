<?php

namespace App\Http\Controllers;

use App\DataTables\CadastroDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCadastroRequest;
use App\Http\Requests\UpdateCadastroRequest;
use App\Repositories\CadastroRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CadastroController extends AppBaseController
{
    /** @var  CadastroRepository */
    private $cadastroRepository;

    public function __construct(CadastroRepository $cadastroRepo)
    {
        $this->cadastroRepository = $cadastroRepo;
    }

    /**
     * Display a listing of the Cadastro.
     *
     * @param CadastroDataTable $cadastroDataTable
     * @return Response
     */
    public function index(CadastroDataTable $cadastroDataTable)
    {
        return $cadastroDataTable->render('cadastros.index');
    }

    /**
     * Show the form for creating a new Cadastro.
     *
     * @return Response
     */
    public function create()
    {
        return view('cadastros.create');
    }

    /**
     * Store a newly created Cadastro in storage.
     *
     * @param CreateCadastroRequest $request
     *
     * @return Response
     */
    public function store(CreateCadastroRequest $request)
    {
        $input = $request->all();

        $cadastro = $this->cadastroRepository->create($input);

        Flash::success('Cadastro saved successfully.');

        return redirect(route('cadastros.index'));
    }

    /**
     * Display the specified Cadastro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            Flash::error('Cadastro not found');

            return redirect(route('cadastros.index'));
        }

        return view('cadastros.show')->with('cadastro', $cadastro);
    }

    /**
     * Show the form for editing the specified Cadastro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            Flash::error('Cadastro not found');

            return redirect(route('cadastros.index'));
        }

        return view('cadastros.edit')->with('cadastro', $cadastro);
    }

    /**
     * Update the specified Cadastro in storage.
     *
     * @param  int              $id
     * @param UpdateCadastroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCadastroRequest $request)
    {
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            Flash::error('Cadastro not found');

            return redirect(route('cadastros.index'));
        }

        $cadastro = $this->cadastroRepository->update($request->all(), $id);

        Flash::success('Cadastro updated successfully.');

        return redirect(route('cadastros.index'));
    }

    /**
     * Remove the specified Cadastro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            Flash::error('Cadastro not found');

            return redirect(route('cadastros.index'));
        }

        $this->cadastroRepository->delete($id);

        Flash::success('Cadastro deleted successfully.');

        return redirect(route('cadastros.index'));
    }
}
