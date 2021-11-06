<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
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
        $data['asideMenu']    = 'income';
        $data['asideSubmenu'] = 'incomeList';

        $data['results'] = Income::all();

        return view('income.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['asideMenu']    = 'income';
        $data['asideSubmenu'] = 'incomeAdd';
        //
        return view('income.create', $data);
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
        $data['asideMenu']    = 'income';
        $data['asideSubmenu'] = 'incomeList';
        //
        return view('income.edit', $data);
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
        $data['asideMenu']    = 'income';
        $data['asideSubmenu'] = 'incomeCategory';

        $data['results'] = Category::all();

        return view('income.category', $data);
    }

    /**
     * show all category.
     */
    public function field()
    {
        $data['asideMenu']    = 'income';
        $data['asideSubmenu'] = 'incomeField';

        $data['results'] = Field::all();

        return view('income.field', $data);
    }


}
