<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.clients.index', [
            'clients' => SpladeTable::for(Client::class)
                ->withGlobalSearch(columns: ['name'])
                ->selectFilter('product_id', $products, 'Категория')
                ->column('name', label: 'Имя пользователя', sortable: true)
                ->column('phoneNumber', label: 'Номер телефона')
                ->column('email', label: 'Почта')
                ->column('product_id', label: 'Название продукта', sortable: true )
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
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.clients.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->phoneNumber = $request->input('phoneNumber');
        $client->email = $request->input('email');
        $client->product_id = $request->input('product_id');
        $client->isActive = $request->input('isActive');
        $client->save();
        Toast::title('Клиент добавлен');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('Admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $products = Product::pluck('title', 'id')->toArray();
        return view('Admin.clients.edit', compact('client'), compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->input('name');
        $client->phoneNumber = $request->input('phoneNumber');
        $client->email = $request->input('email');
        $client->product_id = $request->input('product_id');
        $client->isActive = $request->input('isActive');
        $client->save();
        Toast::title('Клиент обновлен');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        Toast::title('Клиент удален');
        return redirect()->route('clients.index');
    }
}
