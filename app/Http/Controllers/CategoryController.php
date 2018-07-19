<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll() {
        return Category::all()->toArray();
    }

    public function getCategory($id) {
        return Category::find($id)->toArray();
    }

    public function generateCategory(Request $request) {
        $this->validate($request, ['category' => 'required']);
        Category::create(['category' => $request->category,]);
        return response()->json(null, 201);
    }

    public function deleteCategory($id) {
        $eventFound = Category::find($id);
        $eventFound->delete();
        return response()->json(['message' => "Categoria borrado correctamente!"]);
    }

    public function editCategory(Request $request, $id) {
        Category::find($id)->update($request->all());
        return response()->json(['message' => "Categoria actualizdo correctamente!"]);
    }
}
