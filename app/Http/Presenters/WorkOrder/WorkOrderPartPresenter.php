<?php

namespace App\Http\Presenters\WorkOrder;

use App\Models\InventoryStock;
use Orchestra\Contracts\Html\Table\Column;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use App\Models\Inventory;
use App\Models\WorkOrder;
use App\Http\Presenters\Presenter;

class WorkOrderPartPresenter extends Presenter
{
    public function table(WorkOrder $workOrder)
    {
        $parts = $workOrder->parts();

        return $this->table->of('work-orders.parts', function (TableGrid $table) use ($parts) {
            $table->with($parts);

            $table->column('ID', 'id');

            $table->column('SKU', function (Column $column) {
                $column->value = function (InventoryStock $stock) {
                    return $stock->item->getSku();
                };
            });

            $table->column('name', function (Column $column) {
                $column->value = function (InventoryStock $stock) {
                    return $stock->item->name;
                };
            });

            $table->column('location', function (Column $column) {
                $column->value = function (InventoryStock $stock) {
                    return $stock->location->trail;
                };
            });

            $table->column('taken', function (Column $column) {
                $column->value = function (InventoryStock $stock) {
                    return $stock->quantity;
                };
            });
        });
    }

    /**
     * Displays all inventory available for selection.
     *
     * @param WorkOrder $workOrder
     * @param Inventory $inventory
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function tableInventory(WorkOrder $workOrder, Inventory $inventory)
    {
        $inventory = $inventory->noVariants();

        return $this->table->of('work-orders.inventory', function (TableGrid $table) use ($inventory, $workOrder) {
            $table->with($inventory);

            $table->column('ID', 'id');

            $table->column('sku', function (Column $column) {
                $column->label = 'SKU';

                $column->value = function (Inventory $item) {
                    return $item->getSku();
                };
            });

            $table->column('name', function (Column $column) {
                $column->value = function (Inventory $item) {
                    return link_to_route('maintenance.inventory.show', $item->name, [$item->getKey()]);
                };
            });

            $table->column('category', function (Column $column) {
                $column->value = function (Inventory $item) {
                    return $item->category->trail;
                };
            });

            $table->column('current_stock', function (Column $column) {
                $column->value = function (Inventory $item) {
                    return $item->getTotalStock();
                };
            });

            $table->column('select', function (Column $column) use ($workOrder) {
                $column->value = function (Inventory $item) use ($workOrder) {
                    $route = 'maintenance.work-orders.parts.stocks.index';

                    $params = [$workOrder->getKey(), $item->getKey()];

                    $attributes = [
                        'class' => 'btn btn-default btn-sm',
                    ];

                    return link_to_route($route, 'Select', $params, $attributes);
                };
            });
        });
    }
}