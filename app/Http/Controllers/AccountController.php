<?php

namespace App\Http\Controllers;

use App\DataTables\AccountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountController extends AppBaseController
{
    /**
     * Display a listing of the Account.
     *
     * @param AccountDataTable $accountDataTable
     * @return Response
     */
    public function index(AccountDataTable $accountDataTable)
    {
        return $accountDataTable->render('accounts.index');
    }

    /**
     * Show the form for creating a new Account.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created Account in storage.
     *
     * @param CreateAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountRequest $request)
    {
        $input = $request->all();

        /** @var Account $account */
        $account = Account::create($input);

        Flash::success('Account saved successfully.');

        return redirect(route('accounts.index'));
    }

    /**
     * Display the specified Account.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        return view('accounts.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified Account.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        return view('accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified Account in storage.
     *
     * @param  int              $id
     * @param UpdateAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountRequest $request)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        $account->fill($request->all());
        $account->save();

        Flash::success('Account updated successfully.');

        return redirect(route('accounts.index'));
    }

    /**
     * Remove the specified Account from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        $account->delete();

        Flash::success('Account deleted successfully.');

        return redirect(route('accounts.index'));
    }
}
