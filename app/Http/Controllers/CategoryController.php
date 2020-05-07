<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->orderBy('name', 'asc')->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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

        $this->category->create($validatedData);

        return redirect()->route('categories.index')->with(['type'=> 'success', 'message'=> __('Category successfully created').': '.$validatedData['name']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->category = $this->category->find($id);

        if (!$this->category) {
            return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category not found')]);
        }

        return view('categories.show', ['category' => $this->category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->category = $this->category->find($id);

        if (!$this->category) {
            return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category not found')]);
        }

        return view('categories.edit', ['category' => $this->category]);
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
        $this->category = $this->category->find($id);

        if (!$this->category) {
            return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category not found')]);
        }

        $validatedData = $request->validate([
            'name'  => 'required|string',
        ]);

        $this->category->update($validatedData);

        return redirect()->route('categories.index')->with(['type'=> 'success', 'message'=> __('Category successfully updated')]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->category = $this->category->find($id);

        if (!$this->category) {
            return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category not found')]);
        }

        return view('categories.delete', ['category' => $this->category]);
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
        $this->category = $this->category->find($id);

        if (!$this->category) {
            return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category not found')]);
        }

        $name = $this->category->name;
        $this->category->delete($id);

        return redirect()->route('categories.index')->with(['type'=> 'danger', 'message'=> __('Category successfully deleted').': '.$name]);
    }
}
