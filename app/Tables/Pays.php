<?php

namespace App\Tables;

use App\Models\Client;
use App\Models\Order;
use App\Models\Pay;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Pays extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Pay::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $clients = Client::pluck('name', 'id')->toArray();
        $orders = Order::pluck('numberOrder', 'id')->toArray();

        $table
            ->withGlobalSearch(columns: ['client_id'])
            ->column('id', sortable: true)
            ->selectFilter('client_id', $clients, 'Имя клиента')
            ->selectFilter('order_id', $orders, 'Номер заказа')
            ->column('client_id', label: 'Имя клиента', sortable: true )
            ->column('cardNumber', label: 'Номер карты')
            ->column('address', label: 'Имя получателя')
            ->column('order_id', label: 'Номер заказа', sortable: true )
            ->column('isActive', label: 'Статус', exportAs: false)
            ->column('action', 'Действия', canBeHidden: false, exportAs: false)
            ->export()
            ->paginate(10);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
