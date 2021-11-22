<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSale;
use App\Http\Resources\SaleResouce;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    protected $repository;


    public function __construct(Sale $model)
    {
        $this->repository = $model;
        
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->repository->with('seller')->paginate();
        return SaleResource::collection($sales);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSale $request)
    {
        return new SaleResource($this->repository->create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = $this->repository->with('seller')->where('seller_id',$id)->paginate();
        return SaleResource::collection($sales);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSale $request, $id)
    {
        $sale = $this->repository->where('id',$id)->firstOrFail();

        $sale->update($request->validated());
        
        return response()->json(['message'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = $this->repository->where('id',$id)->firstOrFail();

        $sale->delete();

        return response()->json([],204);
    }
}
