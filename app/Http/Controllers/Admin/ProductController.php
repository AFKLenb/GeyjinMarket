<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::pluck('title', 'id')->toArray();
        return view('Admin.products.index',[
            'products' => SpladeTable::for(Product::class)
                ->withGlobalSearch(columns: ['title', 'content'])
                ->selectFilter('category_id', $categories, 'Категория')
                ->column('title', label: 'Название продукта', sortable: true)
                ->column('content', label: 'Описание продукта', )
                ->column('price', label: 'Цена продукта')
                ->column('image', label: 'Изображение продукта', exportAs: false)
                ->column('category_id', label: 'Категория', )
                ->column('stock', label: 'Тип товара')
                ->column('isActive', label: 'Статус')
                ->column('action', 'Действия', canBeHidden: false)
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->toArray();
        return view('Admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->input('title');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->stock = $request->input('stock');
        $product->isActive = $request->input('isActive');
        $product->image = $request->file('image')->store('public/products');
        $product->save();
        Toast::title('Товар добавлен');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('Admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('title', 'id')->toArray();
        return view('Admin.products.edit', compact('product'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->input('title');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->stock = $request->input('stock');
        $product->isActive = $request->input('isActive');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->storeAs('public/products', $fileName);
            $product->image = $fileName;
        }
        $product->save();
        Toast::title('Продукт обновлен');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Toast::title('Продукт удалена');
        return redirect()->route('products.index');
    }
}
