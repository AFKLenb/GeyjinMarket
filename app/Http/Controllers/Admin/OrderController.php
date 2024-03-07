<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Tables\Orders;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.orders.index', compact('products'),[
//            'orders' => SpladeTable::for(Order::class)
//                ->withGlobalSearch(columns: ['numberOrder', 'product_id'])
//                ->selectFilter('product_id', $products, 'Категория')
//                ->column('numberOrder', label: 'Номер заказа', sortable: true)
//                ->column('numberPostavka', label: 'Имя поставщика')
//                ->column('phoneNumber', label: 'Номер телефона', )
//                ->column('email', label: 'Почта')
//                ->column('address', label: 'Имя получателя')
//                ->column('product_id', label: 'Название продукта', sortable: true )
//                ->column('delivery', label: 'Тип доставки')
//                ->column('payment', label: 'Тип оплаты')
//                ->column('isActive', label: 'Статус')
//                ->column('action', 'Действия', canBeHidden: false)
//                ->export()
//                ->paginate(10)
            'orders' => Orders::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.orders.create', compact('order','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->numberOrder = $request->input('numberOrder');
        $order->numberPostavka = $request->input('numberPostavka');
        $order->phoneNumber = $request->input('phoneNumber');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->product_id = $request->input('product_id');
        $order->delivery = $request->input('delivery');
        $order->payment = $request->input('payment');
        $order->isActive = $request->input('isActive');
        $order->save();
        Toast::title('Товар добавлен');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('Admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.orders.edit', compact('order'), compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->numberOrder = $request->input('numberOrder');
        $order->numberPostavka = $request->input('numberPostavka');
        $order->phoneNumber = $request->input('phoneNumber');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->product_id = $request->input('product_id');
        $order->delivery = $request->input('delivery');
        $order->payment = $request->input('address');
        $order->isActive = $request->input('isActive');
        $order->save();
        Toast::title('Заказ обновлен');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        Toast::title('Заказ удален');
        return redirect()->route('orders.index');
    }
}
