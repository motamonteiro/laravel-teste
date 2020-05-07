<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Brand
     */
    private $brand;

    public function __construct(Product $product, Category $category, Brand $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->orderBy('name', 'asc')->paginate(5);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => $this->category->all(),
            'brands' => $this->brand->all()
        ];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'  => 'required|exists:brands,id',
        ]);

        $this->product->create($validatedData);

        return redirect()->route('products.index')->with(['type'=> 'success', 'message'=> __('Product successfully created').': '.$validatedData['name']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->product = $this->product->find($id);

        if (!$this->product) {
            return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product not found')]);
        }

        return view('products.show', ['product' => $this->product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->product = $this->product->find($id);

        if (!$this->product) {
            return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product not found')]);
        }

        $data = [
            'product' => $this->product,
            'categories' => $this->category->all(),
            'brands' => $this->brand->all()
        ];

        return view('products.edit', $data);
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
        $this->product = $this->product->find($id);

        if (!$this->product) {
            return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product not found')]);
        }

        $validatedData = $request->validate([
            'name'  => 'required|string',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'  => 'required|exists:brands,id',
        ]);

        $this->product->update($validatedData);

        return redirect()->route('products.index')->with(['type'=> 'success', 'message'=> __('Product successfully updated')]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->product = $this->product->find($id);

        if (!$this->product) {
            return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product not found')]);
        }

        return view('products.delete', ['product' => $this->product]);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->product = $this->product->find($id);

        if (!$this->product) {
            return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product not found')]);
        }

        $name = $this->product->name;
        $this->product->delete($id);

        return redirect()->route('products.index')->with(['type'=> 'danger', 'message'=> __('Product successfully deleted').': '.$name]);
    }
}
