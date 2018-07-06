<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCadastroAPIRequest;
use App\Http\Requests\API\UpdateCadastroAPIRequest;
use App\Models\Cadastro;
use App\Repositories\CadastroRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CadastroController
 * @package App\Http\Controllers\API
 */

class CadastroAPIController extends AppBaseController
{
    /** @var  CadastroRepository */
    private $cadastroRepository;

    public function __construct(CadastroRepository $cadastroRepo)
    {
        $this->cadastroRepository = $cadastroRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cadastros",
     *      summary="Get a listing of the Cadastros.",
     *      tags={"Cadastro"},
     *      description="Get all Cadastros",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Cadastro")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->cadastroRepository->pushCriteria(new RequestCriteria($request));
        $this->cadastroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cadastros = $this->cadastroRepository->all();

        return $this->sendResponse($cadastros->toArray(), 'Cadastros retrieved successfully');
    }

    /**
     * @param CreateCadastroAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cadastros",
     *      summary="Store a newly created Cadastro in storage",
     *      tags={"Cadastro"},
     *      description="Store Cadastro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cadastro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cadastro")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cadastro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCadastroAPIRequest $request)
    {
        $input = $request->all();

        $cadastros = $this->cadastroRepository->create($input);

        return $this->sendResponse($cadastros->toArray(), 'Cadastro saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cadastros/{id}",
     *      summary="Display the specified Cadastro",
     *      tags={"Cadastro"},
     *      description="Get Cadastro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cadastro",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cadastro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Cadastro $cadastro */
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            return $this->sendError('Cadastro not found');
        }

        return $this->sendResponse($cadastro->toArray(), 'Cadastro retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCadastroAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cadastros/{id}",
     *      summary="Update the specified Cadastro in storage",
     *      tags={"Cadastro"},
     *      description="Update Cadastro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cadastro",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cadastro that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cadastro")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cadastro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCadastroAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cadastro $cadastro */
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            return $this->sendError('Cadastro not found');
        }

        $cadastro = $this->cadastroRepository->update($input, $id);

        return $this->sendResponse($cadastro->toArray(), 'Cadastro updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cadastros/{id}",
     *      summary="Remove the specified Cadastro from storage",
     *      tags={"Cadastro"},
     *      description="Delete Cadastro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cadastro",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Cadastro $cadastro */
        $cadastro = $this->cadastroRepository->findWithoutFail($id);

        if (empty($cadastro)) {
            return $this->sendError('Cadastro not found');
        }

        $cadastro->delete();

        return $this->sendResponse($id, 'Cadastro deleted successfully');
    }
}
