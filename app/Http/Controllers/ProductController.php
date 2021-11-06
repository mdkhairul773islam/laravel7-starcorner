<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productList';

        $data['categoryList']    = Category::all();
        $data['subcategoryList'] = Subcategory::all();
        $data['brandList']       = Brand::all();
        $data['unitList']        = Unit::all();

        // get all product
        $data['results'] = Product::with('category', 'subcategory', 'brand', 'unit')->get();

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productAdd';

        $data['categoryList']    = Category::all();
        $data['subcategoryList'] = Subcategory::all();
        $data['brandList']       = Brand::all();
        $data['unitList']        = Unit::all();

        return view('product.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productName = trim($request->name);

        // generate product code
        $code = rand(100000, 999999);
        while (Product::where('code', $code)->first()) {
            $code = rand(100000, 999999);
        }

        if (Product::where('name', $productName)->first()) {
            $message = ['warning' => 'This product already exists.'];
        } else {

            $data = new Product;

            $data->code           = $code;
            $data->name           = $productName;
            $data->model          = trim($request->model);
            $data->category_id    = $request->category_id;
            $data->subcategory_id = $request->subcategory_id;
            $data->brand_id       = $request->brand_id;
            $data->purchase_price = $request->purchase_price;
            $data->sale_price     = $request->sale_price;
            $data->status         = $request->status;
            $data->unit_id        = $request->unit_id;

            $data->save();

            $message = ['success' => 'Product successfully added.'];
        }
        return redirect()->route('admin.product.create')->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productList';

        return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productList';

        $data['categoryList']    = Category::all();
        $data['subcategoryList'] = Subcategory::all();
        $data['brandList']       = Brand::all();
        $data['unitList']        = Unit::all();

        // get product info
        $data['info'] = Product::where('id', $id)->first();

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $productName = trim($request->name);

        if (Product::where('name', $productName)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This product already exists.'];
        } else {

            $data = Product::find($request->id);

            $data->name           = $productName;
            $data->model          = trim($request->model);
            $data->category_id    = $request->category_id;
            $data->subcategory_id = $request->subcategory_id;
            $data->brand_id       = $request->brand_id;
            $data->purchase_price = $request->purchase_price;
            $data->sale_price     = $request->sale_price;
            $data->status         = $request->status;
            $data->unit_id        = $request->unit_id;

            $data->save();

            $message = ['success' => 'Product successfully updated.'];
        }
        return redirect()->route('admin.product')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.product')->with(['delete' => 'Product delete successful.']);
    }

    /**
     * show all category.
     */
    public function category()
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productCategory';

        $data['results'] = Category::all();

        return view('product.category', $data);
    }

    /**
     * store category.
     */
    public function categoryStore(Request $request)
    {
        $category = trim($request->name);

        if (Category::where('name', $category)->first()) {
            $message = ['warning' => 'This category already exists.'];
        } else {

            $data = new Category;

            $data->name = $category;
            $data->slug = strSlug($category);

            $data->save();

            $message = ['success' => 'Category successfully added.'];
        }

        return redirect()->route('admin.product.category')->with($message);
    }

    /**
     * edit category.
     */
    public function categoryEdit(Request $request)
    {
        return Category::select(['id', 'name'])->find($request->id);
    }

    /**
     * update category.
     */
    public function categoryUpdate(Request $request)
    {
        $category = trim($request->name);

        if (Category::where('name', $category)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This category already exists.'];
        } else {

            $data = Category::find($request->id);

            $data->name = $category;
            $data->slug = strSlug($category);

            $data->save();

            $message = ['update' => 'Category successfully updated.'];
        }

        return redirect()->route('admin.product.category')->with($message);
    }

    /**
     * destroy category.
     */
    public function categoryDestroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('admin.product.category')->with(['delete' => 'Category delete successful.']);
    }


    /**
     * show all subcategory.
     */
    public function subcategory(Request $request)
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productSubcategory';

        $data['results'] = Subcategory::all();

        return view('product.subcategory', $data);
    }

    /**
     * store subcategory.
     */
    public function subcategoryStore(Request $request)
    {
        $subcategory = trim($request->name);

        if (Subcategory::where('name', $subcategory)->first()) {
            $message = ['warning' => 'This subcategory already exists.'];
        } else {

            $data = new Subcategory;

            $data->name = $subcategory;
            $data->slug = strSlug($subcategory);

            $data->save();

            $message = ['success' => 'Subcategory successfully added.'];
        }

        return redirect()->route('admin.product.subcategory')->with($message);
    }

    /**
     * edit subcategory.
     */
    public function subcategoryEdit(Request $request)
    {
        return Subcategory::select(['id', 'name'])->find($request->id);
    }

    /**
     * update subcategory.
     */
    public function subcategoryUpdate(Request $request)
    {

        $subcategory = trim($request->name);

        if (Subcategory::where('name', $subcategory)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This subcategory already exists.'];
        } else {

            $data = Subcategory::find($request->id);

            $data->name = $subcategory;
            $data->slug = strSlug($subcategory);

            $data->save();

            $message = ['update' => 'Subcategory successfully updated.'];
        }

        return redirect()->route('admin.product.subcategory')->with($message);
    }

    /**
     * delete subcategory.
     */
    public function subcategoryDestroy($id)
    {
        Subcategory::find($id)->delete();

        return redirect()->route('admin.product.subcategory')->with(['delete' => 'Subcategory deleted successful.']);
    }


    /**
     * all brand.
     */
    public function brand()
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productBrand';

        $data['results'] = Brand::all();

        return view('product.brand', $data);
    }

    /**
     * store brand.
     */
    public function brandStore(Request $request)
    {
        $brand = trim($request->name);

        if (Brand::where('name', $brand)->first()) {
            $message = ['warning' => 'This brand already exists.'];
        } else {

            $data = new Brand;

            $data->name = $brand;
            $data->slug = strSlug($brand);

            $data->save();

            $message = ['success' => 'Brand successfully added.'];
        }

        return redirect()->route('admin.product.brand')->with($message);
    }

    /**
     * edit brand.
     */
    public function brandEdit(Request $request)
    {
        return Brand::select(['id', 'name'])->find($request->id);
    }

    /**
     * update brand.
     */
    public function brandUpdate(Request $request)
    {

        $brand = trim($request->name);

        if (Brand::where('name', $brand)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This brand already exists.'];
        } else {

            $data = Brand::find($request->id);

            $data->name = $brand;
            $data->slug = strSlug($brand);

            $data->save();

            $message = ['update' => 'Brand successfully updated.'];
        }

        return redirect()->route('admin.product.brand')->with($message);
    }

    /**
     * delete brand.
     */
    public function brandDestroy($id)
    {
        Brand::find($id)->delete();

        return redirect()->route('admin.product.brand')->with(['delete' => 'Brand deleted successful.']);
    }


    /**
     * all unit.
     */
    public function unit()
    {
        $data['asideMenu']    = 'product';
        $data['asideSubmenu'] = 'productUnit';

        $data['results'] = Unit::all();

        return view('product.unit', $data);
    }

    /**
     * store brand.
     */
    public function unitStore(Request $request)
    {

        $unit = trim($request->unit);

        if (Unit::where('unit', $unit)->first()) {
            $message = ['warning' => 'This unit already exists.'];
        } else {

            $data = new Unit;

            $data->unit = $unit;

            $data->save();

            $message = ['success' => 'Unit successfully added.'];
        }

        return redirect()->route('admin.product.unit')->with($message);
    }

    /**
     * edit unit.
     */
    public function unitEdit(Request $request)
    {
        return Unit::select(['id', 'unit'])->find($request->id);
    }

    /**
     * update unit.
     */
    public function unitUpdate(Request $request)
    {
        $unit = trim($request->unit);

        if (Unit::where('unit', $unit)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This unit already exists.'];
        } else {

            $data = Unit::find($request->id);

            $data->unit = $unit;

            $data->save();

            $message = ['update' => 'Unit successfully updated.'];
        }

        return redirect()->route('admin.product.unit')->with($message);
    }

    /**
     * delete unit.
     */
    public function unitDestroy($id)
    {
        Unit::find($id)->delete();

        return redirect()->route('admin.product.unit')->with(['delete' => 'Unit deleted successful.']);
    }

}
