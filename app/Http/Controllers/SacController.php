<?php

namespace App\Http\Controllers;

use App\Sac;
use Illuminate\Http\Request;
use App\DAMPLUScontactosWap;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class SacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cedula = $request->get('cedula');
        $sac=DAMPLUScontactosWap::orderBy('dato3', 'DESC')
        ->cedula($cedula)
        ->paginate(5);

      ///  $count = User::where('votes', '>', 100)->count();
        $contactos=DAMPLUScontactosWap::distinct()->count();
        $contactoswap=DAMPLUScontactosWap::distinct()->where('numero', '<>', '')->count();
        $contactossms=DAMPLUScontactosWap::where('sms', '<>', null)->count();
        $contactosemail=DAMPLUScontactosWap::where('email', '<>', null)->count();
        $comunicacion=DAMPLUScontactosWap::where('dato3', '<>', null)->count();
        $comunicacionwap=DAMPLUScontactosWap::wherein('dato2', ['58','59','60','61'])->count();

        $contactoswapsac=DAMPLUScontactosWap::where('numero', '<>', '')->where('area', '=', 'SAC')->count();

        $comunicacionwapsac=DAMPLUScontactosWap::wherein('dato2', ['58','59','60','61'])->where('area', '=', 'SAC')->count();
       //dd( $comunicacionwapsac);

        return view('sac.index', compact('sac','contactos','contactossms','contactosemail','comunicacion','contactoswap','contactoswapsac','comunicacionwapsac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function show(Sac $sac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function edit(Sac $sac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sac $sac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sac $sac)
    {
        //
    }
}
