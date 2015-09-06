<?php

namespace Bugs\Http\Controllers;

use Bugs\Http\Controllers\Base\Controller;
use Bugs\Http\Requests;
use Bugs\Views\LoginView;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LoginController
    extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @Get("/")
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {

        $loginView = new LoginView();
        return $loginView->layout()->render($request);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
