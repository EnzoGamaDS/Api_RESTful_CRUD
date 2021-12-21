<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function show ($id){
        $categories = Category::find($id);
        return response()->json($categories);

    }
    public function store(Request $request){
        $categories =  Category::create($request->only(['name', 'description']));
        return response()->json($categories);
    }
    public function update($id, Request $request){
        $categories = Category::find($id);
        $categories->update($request->only(['name', 'description'])); // restringe a atualização a nome e desc

        return response()->json($categories->fresh());
    }
    public function destroy($id){
        $categories = Category::find($id);
        return response()->json($categories->delete());
    }
}
