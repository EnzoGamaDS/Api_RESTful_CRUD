<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index($categoryId){
        //$products = Product::with('category')->all(); //with tras o retorno do produto com ccategoria acoplado
        $products = Category::find($categoryId)->products()->get(); // busca pelo id da categoria todos os produtos daquela categoria
        return response()->json($products);
    }
    public function store($categoryId, Request $request){
       // $products =  Product::create($request->only(['name', 'description']));

        /*
        Product::create(['name'=>$request->name, 'description'=>$request->description,'category_id'=>$request=>categpry_id]); */

       $products = Category::find($categoryId)->products()->create($request->only(['name', 'description'])); 
       return response()->json($products);
    }
    public function update($id, Request $request){
        $products = Product::find($id);
        $products->update($request->only(['name', 'description'])); // restringe a atualização a nome e desc

        return response()->json($products->fresh());
    }
    public function destroy($id){
        $products = Product::find($id);
        return response()->json($products->delete());
    }
}
