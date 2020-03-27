<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AtivoCreateRequest;
use App\Http\Requests\AtivoUpdateRequest;
use App\Repositories\AtivoRepository;
use App\Validators\AtivoValidator;

/**
 * Class AtivosController.
 *
 * @package namespace App\Http\Controllers;
 */
class AtivosController extends Controller
{
    /**
     * @var AtivoRepository
     */
    protected $repository;

    /**
     * @var AtivoValidator
     */
    protected $validator;

    /**
     * AtivosController constructor.
     *
     * @param AtivoRepository $repository
     * @param AtivoValidator $validator
     */
    public function __construct(AtivoRepository $repository, AtivoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $ativos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ativos,
            ]);
        }

        return view('ativos.index', compact('ativos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AtivoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AtivoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ativo = $this->repository->create($request->all());

            $response = [
                'message' => 'Ativo created.',
                'data'    => $ativo->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ativo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ativo,
            ]);
        }

        return view('ativos.show', compact('ativo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ativo = $this->repository->find($id);

        return view('ativos.edit', compact('ativo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AtivoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AtivoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ativo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ativo updated.',
                'data'    => $ativo->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Ativo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ativo deleted.');
    }
}
