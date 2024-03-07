<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\Pay;
use App\Tables\Pays;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::pluck('name', 'id')->toArray();
        $orders = Order::pluck('numberOrder', 'id')->toArray();
        return view('Admin.pays.index', [
            'pays' => Pays::class,

//            'pays' => SpladeTable::for(Pay::class)
//                ->withGlobalSearch(columns: ['client_id'])
//                ->selectFilter('client_id', $clients, 'Имя клиента')
//                ->selectFilter('order_id', $orders, 'Номер заказа')
//                ->column('client_id', label: 'Имя клиента', sortable: true )
//                ->column('cardNumber', label: 'Номер карты')
//                ->column('address', label: 'Почта')
//                ->column('order_id', label: 'Номер заказа', sortable: true )
//                ->column('isActive', label: 'Статус')
//                ->column('action', 'Действия', canBeHidden: false)
//                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::pluck('name', 'id')->toArray();
        $orders = Order::pluck('numberOrder', 'id')->toArray();
        return view('Admin.pays.create', compact('clients', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pay = new Pay();
        $pay->cardNumber = $request->input('cardNumber');
        $pay->address = $request->input('address');
        $pay->client_id = $request->input('client_id');
        $pay->order_id = $request->input('order_id');
        $pay->isActive = $request->input('isActive');
        $pay->save();
        Toast::title('Платёж добавлен');
        return redirect()->route('pays.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pay $pay)
    {
        $clients = Client::pluck('name', 'id')->toArray();
        $orders = Order::pluck('numberOrder', 'id')->toArray();
        return view('Admin.pays.show', compact( 'pay','clients', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pay $pay)
    {
        $clients = Client::pluck('name', 'id')->toArray();
        $orders = Order::pluck('numberOrder', 'id')->toArray();
        return view('Admin.pays.edit', compact('pay'), compact('clients', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pay $pay)
    {
        $pay->cardNumber = $request->input('cardNumber');
        $pay->address = $request->input('address');
        $pay->client_id = $request->input('client_id');
        $pay->order_id = $request->input('order_id');
        $pay->isActive = $request->input('isActive');
        $pay->save();
        Toast::title('Платёж обновлен');
        return redirect()->route('pays.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pay $pay)
    {
        $pay->delete();
        Toast::title('Платёж удален');
        return redirect()->route('pays.index');
    }
}
