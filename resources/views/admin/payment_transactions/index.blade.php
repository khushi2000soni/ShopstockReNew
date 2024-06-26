@extends('layouts.app')
@section('title')@lang('quickadmin.transaction-management.fields.sales') @endsection
@section('customCss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('admintheme/assets/css/printView-datatable.css')}}">
@endsection
@section('main-content')

<section class="section roles" style="z-index: unset">
  <div class="section-body">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>
                @lang('quickadmin.transaction.'.$type.'_title')
                </h4>

                @can('estimate_date_filter_access')
                    @if($type != 'modified_sales' && $type != 'current_estimate' && $type!='sales_return' && $type!='cancelled')
                    <div class="col-md-8">
                        <form class="row estimate-trans-topform">
                            <div class="col-md-4 form-group date_main_show">
                                <input type="date" class="form-control dateshow" name="start_date" id="start_date" value="{{$_GET['start_date']??''}}" autocomplete="false">
                            </div>
                            <div class="col-md-4 form-group date_main_show">
                                <input type="date" class="form-control dateshow" name="end_date" id="end_date"   value="{{$_GET['end_date']??''}}" autocomplete="false">
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start estimate-trans-top">
                                    <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-primary mr-1 col reset-filter" id="reset-filter">@lang('quickadmin.qa_reset')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                @endcan
                @can('estimate_print')
                @if ($type !=='cash_reciept' && $type !== 'cancelled')
                <div class="col-auto px-md-1 pr-1">
                    <a  role="button" class="btn printbtn h-10 col circlebtn"  id="order-print" title="@lang('quickadmin.qa_print')"> <x-svg-icon icon="print" /></a>
                </div>
                @endif
                @endcan
            </div>

        <div class="card-body">
          <div class="table-responsive fixed_Search">
            {{$dataTable->table(['class' => 'table dt-responsive dropdownBtnTable estimates_transactions_table cash-reciept-trans', 'style' => 'width:100%;'])}}
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
</section>


<!-- view Modal -->
<div class="modal fade " id="view_model_Modal" tabindex="-1" role="dialog" aria-labelledby="view_model_ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        @if ($type=='cash_reciept' || $type=='sales')
            <h5 class="modal-title head-title" id="exampleModalLongTitle"></h5>
        @else
        <h5 class="modal-title" id="exampleModalLongTitle">@lang('quickadmin.order.view-title-'.$type)</h5>
        @endif

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body show_html">
      </div>
    </div>
  </div>
</div>
<!-- view Modal -->
@endsection

@section('customJS')
{!! $dataTable->scripts() !!}
<script src="{{ asset('admintheme/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/js/page/datatables.js') }}"></script>

<script type="text/javascript">
var order_selectedIds = [];
$(document).ready(function() {
    var DataaTable = $('#payment_transaction-table').DataTable();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('draw.dt','#payment_transaction-table', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 'fast');
    });

    $(document).on('click', '.view_detail', function() {
      $("#body").prepend('<div class="loader" id="loader_div"></div>');
      $("#view_model_Modal").modal('show');
      $('.show_html').html('');
      var url = $(this).data('url');
      var head_title = $(this).attr('data-customerName');
      if (url) {
        $.ajax({
          type: "GET",
          url: url,
          data: {
            type : '{{$type}}'
          },
          success: function(data) {
            $("#loader_div").remove();
            $('.show_html').html(data.html);
            $("#view_model_Modal .head-title").html(head_title);
          },
          error: function () {
            $("#loader_div").remove();
          }
        });
      }
    });

    $(document).on('click', '.view_history_detail', function() {
      $("#body").prepend('<div class="loader" id="loader_div"></div>');
      $("#view_model_Modal").modal('show');
      $('.show_html').html('');
      var url = $(this).data('url');
      var head_title = $(this).attr('data-customerName');
      //console.log(head_title);
      if (url) {
        $.ajax({
          type: "GET",
          url: url,
          success: function(data) {
            $("#loader_div").remove();
            $('.show_html').html(data.html);
            $("#view_model_Modal .head-title").html(head_title);
            DataaTable.ajax.reload();
          },
          error: function () {
            $("#loader_div").remove();
          }
        });
      }
    });

    $(document).on('click', '.delete_transaction', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var delete_url = "{{ route('admin.transactions.destroy',['transaction'=> ':transactionId']) }}";
      delete_url = delete_url.replace(':transactionId', id);
      swal({
        title: "{{ trans('messages.deletetitle') }}",
        text: "{{ trans('messages.areYouSure') }}",
        icon: 'warning',
        buttons: {
          confirm: 'Yes, delete it',
          cancel: 'No, cancel',
        },
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          // If the user confirms, send the DELETE request
          $.ajax({
            url: delete_url,
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              var alertType = response['alert-type'];
              var message = response['message'];
              var title = "{{ trans('quickadmin.transaction.title_singular') }}";
              showToaster(title, alertType, message);
              DataaTable.ajax.reload();
              // location.reload();

            },
            error: function(xhr) {
              // Handle error response
              swal("{{ trans('quickadmin.transaction.title_singular') }}", 'some mistake is there.', 'error');
            }
          });
        }
      });
    });

    // Checkbox & Print Functionality
    $(document).on('change', '#dt_cb_all', function(e)
    {
        e.preventDefault();
        var isChecked = $(this).prop('checked');
        $('.dt_checkbox').prop('checked', isChecked).trigger('change');
    });

    $(document).on('change', '.dt_checkbox', function(e)
    {
        e.preventDefault();
        // order_selectedIds = [];
        $('.dt_checkbox:checked').each(function() {
            order_selectedIds.push($(this).val());
        });

        // When uncheck order remove id from the selected_ids array
        if (!$(this).is(':checked')) {
            var valueToRemove = $(this).val();
            var indexToRemove = order_selectedIds.indexOf(valueToRemove);
            if (indexToRemove !== -1) {
                order_selectedIds.splice(indexToRemove, 1);
            }
        }

        order_selectedIds = Array.from(new Set(order_selectedIds));
    });

    $(document).on('click', '#order-print',function(e)
    {
        if (order_selectedIds.length > 0) {
            var printUrl = "{{ route('admin.order.allprint') }}?order_ids=" + encodeURIComponent(order_selectedIds.join(','));
            window.open(printUrl, '_blank');
        }else{
            swal("Print", 'Please Select Some Record', 'error');
        }
    });


    $(document).on('click','.reset-filter', function(e)
    {
        e.preventDefault();
        var currentUrl = window.location.href;
        // Remove the query parameters
        var urlWithoutParams = currentUrl.split('?')[0];
        window.location.href = urlWithoutParams;
    });

    // orderids using session
    // $(document).on('click', '#order-prinnnt', function(e) {
    //     e.preventDefault();
    //     var key = 'order_selectedIds';
    //     if (order_selectedIds.length > 0) {
    //         $.ajax({
    //             url: "{{ route('admin.order.storeSessionData') }}",
    //             type: "POST",
    //             data: { key: key, data: order_selectedIds },
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(response) {
    //                 var printUrl = "{{ route('admin.order.allprint') }}?key=" + encodeURIComponent(key);
    //                 window.open(printUrl, '_blank');
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error("Error storing session data:", error);
    //             }
    //         });
    //         console.log("Session value after setting:", sessionStorage.getItem(key));
    //         var printUrl = "{{ route('admin.order.allprint') }}?key=" + encodeURIComponent(key);
    //         window.open(printUrl, '_blank');
    //     } else {
    //         swal("Print", 'Please Select Some Record', 'error');
    //     }
    // });


});

</script>
@endsection
