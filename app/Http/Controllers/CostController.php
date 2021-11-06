<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asideMenu']    = 'cost';
        $data['asideSubmenu'] = 'costList';

        $data['results'] = Cost::all();

        return view('cost.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['asideMenu']    = 'cost';
        $data['asideSubmenu'] = 'costAdd';
        //
        return view('cost.create', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'cost';
        $data['asideSubmenu'] = 'costList';
        //
        return view('cost.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * show all category.
     */
    public function category()
    {
        $data['asideMenu']    = 'cost';
        $data['asideSubmenu'] = 'costCategory';

        $data['results'] = Category::all();

        return view('cost.category', $data);
    }

    /**
     * show all category.
     */
    public function field()
    {
        $data['asideMenu']    = 'cost';
        $data['asideSubmenu'] = 'costField';

        $data['results'] = Field::all();

        return view('cost.field', $data);
    }
}
