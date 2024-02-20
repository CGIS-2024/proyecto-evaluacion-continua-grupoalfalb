<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeplan_alimentacionRequest;
use App\Http\Requests\Updateplan_alimentacionRequest;
use App\Models\plan_alimentacion;

class PlanAlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeplan_alimentacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(plan_alimentacion $plan_alimentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plan_alimentacion $plan_alimentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateplan_alimentacionRequest $request, plan_alimentacion $plan_alimentacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plan_alimentacion $plan_alimentacion)
    {
        //
    }
}
