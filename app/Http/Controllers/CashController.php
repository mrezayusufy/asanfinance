<?php

namespace App\Http\Controllers;

use App\DataTables\CashDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCashRequest;
use App\Http\Requests\UpdateCashRequest;
use App\Models\Cash;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CashController extends AppBaseController
{
    /**
     * Display a listing of the Cash.
     *
     * @param CashDataTable $cashDataTable
     * @return Response
     */
    public function index(CashDataTable $cashDataTable)
    {
        return $cashDataTable->render('cashes.index');
    }

    /**
     * Show the form for creating a new Cash.
     *
     * @return Response
     */
    public function create()
    {
        return view('cashes.create');
    }

    /**
     * Store a newly created Cash in storage.
     *
     * @param CreateCashRequest $request
     *
     * @return Response
     */
    public function store(CreateCashRequest $request)
    {
        $input = $request->all();

        /** @var Cash $cash */
        $cash = Cash::create($input);

        Flash::success('Cash saved successfully.');

        return redirect(route('cashes.index'));
    }

    /**
     * Display the specified Cash.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cash $cash */
        $cash = Cash::find($id);

        if (empty($cash)) {
            Flash::error('Cash not found');

            return redirect(route('cashes.index'));
        }

        return view('cashes.show')->with('cash', $cash);
    }

    /**
     * Show the form for editing the specified Cash.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Cash $cash */
        $cash = Cash::find($id);

        if (empty($cash)) {
            Flash::error('Cash not found');

            return redirect(route('cashes.index'));
        }

        return view('cashes.edit')->with('cash', $cash);
    }

    /**
     * Update the specified Cash in storage.
     *
     * @param  int              $id
     * @param UpdateCashRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCashRequest $request)
    {
        /** @var Cash $cash */
        $cash = Cash::find($id);

        if (empty($cash)) {
            Flash::error('Cash not found');

            return redirect(route('cashes.index'));
        }

        $cash->fill($request->all());
        $cash->save();

        Flash::success('Cash updated successfully.');

        return redirect(route('cashes.index'));
    }

    /**
     * Remove the specified Cash from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cash $cash */
        $cash = Cash::find($id);

        if (empty($cash)) {
            Flash::error('Cash not found');

            return redirect(route('cashes.index'));
        }

        $cash->delete();

        Flash::success('Cash deleted successfully.');

        return redirect(route('cashes.index'));
    }
}
