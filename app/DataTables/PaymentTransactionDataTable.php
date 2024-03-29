<?php

namespace App\DataTables;

use App\Models\PaymentTransaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class PaymentTransactionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

    public function dataTable(QueryBuilder $query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            // ->editColumn('list_checkbox', function ($row) {
            //     $listcheckbox = '<input type="checkbox" id="select-checkbox-'.$row->id.'" class="select-checkbox" data-transaction="'.$row->id.'" data-order="'.$row->order_id.'"/>';
            //     return $listcheckbox;
            // })
            ->editColumn('entry_date', function ($row) {
                return date('d-m-Y', strtotime($row->entry_date)) ?? "";
            })
            ->editColumn('customer_id', function ($row) {
                return $row->customer->name ?? "";
            })
            ->editColumn('voucher_number', function ($row) {
                return $row->voucher_number ?? "";
            })
            ->editColumn('payment_way', function ($row) {
                return (isset(config('constant.paymentModifyWays')[$row->payment_way]) ? config('constant.paymentModifyWays')[$row->payment_way] : '');
            })
            ->editColumn('credit_amount', function ($row) {
                return ($row->payment_type == 'credit' ? number_format(abs($row->amount), 2) : '');
            })
            ->editColumn('debit_amount', function ($row) {
                return ($row->payment_type == 'debit' ? number_format(abs($row->amount), 2) : '');
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                // if (Gate::check('product_access')) {
                $viewIcon = view('components.svg-icon', ['icon' => 'view'])->render();

                // }
                // if (Gate::check('product_edit')) {
                $typeAction = $this->type;
                $today = now()->format('Y-m-d');
                $date_created = $row->created_at->format('Y-m-d');

                $editIcon = view('components.svg-icon', ['icon' => 'edit'])->render();
                if ($this->type == 'sales_return' || $this->type == 'sales' || $this->type == 'modified_sales' || $this->type == 'cancelled' || $this->type == 'current_estimate') {
                    if (Gate::check('estimate_edit') && $this->type != 'cancelled') {
                       // sales me only edit and delete show only when order is created at today
                        if($typeAction == "sales"){
                            if($today == $date_created){
                                 $action .= '<a href="' . route("admin.orders.edit", [$this->type, encrypt($row->order_id)]) . '" class="btn btn-icon btn-info m-1 edit_product">' . $editIcon . '</a>';
                            }
                        }else{
                            $action .= '<a href="' . route("admin.orders.edit", [$this->type, encrypt($row->order_id)]) . '" class="btn btn-icon btn-info m-1 edit_product">' . $editIcon . '</a>';
                        }
                    }
                    if (Gate::check('estimate_access')) {
                        $action .= '<a data-url="' . route('admin.orders.show', encrypt($row->order_id)) . '" href="javascript:void(0)" class="btn btn-icon btn-info m-1 view_detail" >' . $viewIcon . '</a>';
                    }
                } else if ($this->type == 'cash_reciept') {
                    if (Gate::check('transaction_edit')) {
                        $action .= '<a href="' . route("admin.transactions.edit", encrypt($row->id)) . '" class="btn btn-icon btn-info m-1 edit_product">' . $editIcon . '</a>';
                    }
                    if (Gate::check('transaction_access')) {
                        $action .= '<a href="javascript:void(0)" data-url="' . route('admin.transactions.show', encrypt($row->id)) . '" class="btn btn-icon btn-info m-1 view_detail" >' . $viewIcon . '</a>';
                    }
                }
                $deleteIcon = view('components.svg-icon', ['icon' => 'delete'])->render();
                if ((Gate::check('estimate_delete') && ($this->type == 'sales_return' || $this->type == 'sales' || $this->type == 'modified_sales' || $this->type == 'current_estimate')) || (Gate::check('transaction_delete') && $this->type == 'cash_reciept')) {
                    if($typeAction == "sales"){
                        if($today == $date_created){
                            $action .= '<a href="javascript:void(0)" class="btn btn-icon btn-danger m-1 delete_transaction" data-id="' . encrypt($row->id) . '">  ' . $deleteIcon . '</a>';
                        }
                    }else{
                        $action .= '<a href="javascript:void(0)" class="btn btn-icon btn-danger m-1 delete_transaction" data-id="' . encrypt($row->id) . '">  ' . $deleteIcon . '</a>';
                    }
                }
                return $action;
            })
            ->rawColumns(['action','list_checkbox']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PaymentTransaction $model): QueryBuilder
    {
        $type = $this->type;

        switch ($type) {
            case 'sales_return':
                $model = $model->where('payment_way', 'order_return');
                break;

            case 'sales':
                $model = $model->where('payment_way', 'order_create');
                break;

            case 'modified_sales':
                $model = $model->with('order')->where('payment_way', 'order_create')->whereHas('order', function ($query) {
                    $query->whereHas('orderProduct', function ($subquery) {
                        $subquery->whereDate('updated_at', Carbon::today());
                    });
                });
                break;

            case 'cash_reciept':
                $model = $model->whereIn('payment_way', ['by_cash', 'by_check', 'by_account'])->whereNotNull('voucher_number')->where('remark', '!=', 'Opening balance');
                break;

            case 'cancelled':
                $model = $model->where('is_split', 0)->onlyTrashed();
                break;

            case 'current_estimate':
                $today = now()->format('Y-m-d');
                $model = $model->whereDate('created_at', $today)->where('payment_way', 'order_create');
                break;

            default:
                // Handle unknown type here  
                return abort(404);
                break;
        }
        // if ($type == 'case_reciept') {
        //     $model = $model->orderBy('voucher_number', 'desc');
        // } else {
        //     $model = $model->orderBy('entry_date', 'asc');
        // }
        // $this->start_date
        if($this->startDate !=''){
            $model->whereDate('created_at','>=',$this->startDate);
        }
        if($this->endDate !=''){
            $model->whereDate('created_at','<=',$this->endDate);
        }

        return $model;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('payment_transaction-table')
            ->parameters([
                'responsive' => true,
                'pageLength' => 70,
                'lengthMenu' => [[10, 25, 50, 70, 100, -1], [10, 25, 50, 70, 100, 'All']],
            ])
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            ->orderBy(1)
            // ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

             Column::make('DT_RowIndex')->title(trans('quickadmin.qa_sn'))->orderable(false)->searchable(false),
            //Column::make('list_checkbox')->title('<input type="checkbox" id="select-all"  class="select-checkbox" />')->orderable(false)->searchable(false),
            Column::make('entry_date')->title(trans('quickadmin.order.fields.estimate_date')),
            Column::make('customer_id')->title(trans('quickadmin.transaction.fields.customer')),
            Column::make('voucher_number')->title(trans('quickadmin.estimate_number')),
            Column::make('payment_way')->title(trans('quickadmin.transaction.fields.payment_type')),
            Column::make('credit_amount')->title(trans('quickadmin.transaction.fields.credit_amount'))->name('amount'),
            Column::make('debit_amount')->title(trans('quickadmin.transaction.fields.debit_amount'))->name('amount'),
            Column::make('created_at')->title(trans('quickadmin.transaction.fields.created_at')),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')->title(trans('quickadmin.qa_action')),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'order' . date('YmdHis');
    }
}
