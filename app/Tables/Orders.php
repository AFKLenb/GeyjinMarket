<?php

namespace App\Tables;

use App\Models\Order;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Orders extends AbstractTable
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
        return Order::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['numberOrder'])
            ->column('id', sortable: true)
            ->column('numberOrder', label: 'Номер заказа', sortable: true)
            ->column('numberPostavka', label: 'Имя поставщика')
            ->column('phoneNumber', label: 'Номер телефона', )
            ->column('email', label: 'Почта')
            ->column('address', label: 'Имя получателя')
            ->column('product_id', label: 'Название продукта', sortable: true )
            ->column('delivery', label: 'Тип доставки')
            ->column('payment', label: 'Тип оплаты')
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
