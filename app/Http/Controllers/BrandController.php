<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @var Brand
     */
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brand->orderBy('name', 'asc')->paginate(5);
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
        ]);

        $this->brand->create($validatedData);

        return redirect()->route('brands.index')->with(['type'=> 'success', 'message'=> __('Brand successfully created').': '.$validatedData['name']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->brand = $this->brand->find($id);

        if (!$this->brand) {
            return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand not found')]);
        }

        return view('brands.show', ['brand' => $this->brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->brand = $this->brand->find($id);

        if (!$this->brand) {
            return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand not found')]);
        }

        return view('brands.edit', ['brand' => $this->brand]);
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
        $this->brand = $this->brand->find($id);

        if (!$this->brand) {
            return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand not found')]);
        }

        $validatedData = $request->validate([
            'name'  => 'required|string',
        ]);

        $this->brand->update($validatedData);

        return redirect()->route('brands.index')->with(['type'=> 'success', 'message'=> __('Brand successfully updated')]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->brand = $this->brand->find($id);

        if (!$this->brand) {
            return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand not found')]);
        }

        return view('brands.delete', ['brand' => $this->brand]);
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
        $this->brand = $this->brand->find($id);

        if (!$this->brand) {
            return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand not found')]);
        }

        $name = $this->brand->name;
        $this->brand->delete($id);

        return redirect()->route('brands.index')->with(['type'=> 'danger', 'message'=> __('Brand successfully deleted').': '.$name]);
    }
}
