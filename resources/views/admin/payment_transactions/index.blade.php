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
          @if($type != 'modified_sales' && $type != 'current_estimate')
          <div class="col-md-8">
              <form class="row">
                <div class="col-md-4 form-group date_main_show">              
                    <input type="date" class="form-control dateshow" name="start_date" id="start_date" value="{{$_GET['start_date']??''}}" autocomplete="false">
                </div>
                <div class="col-md-4 form-group date_main_show">              
                    <input type="date" class="form-control dateshow" name="end_date" id="end_date"   value="{{$_GET['end_date']??''}}" autocomplete="false">
                </div>
                <div class="col-md-2">
                  <input type="submit" class="btn btn-sm btn-success" value="Submit">
                </div>
              </form>
          </div>
          @endif


          </div>
       
        <div class="card-body">
          <div class="table-responsive fixed_Search">
            {{$dataTable->table(['class' => 'table dt-responsive dropdownBtnTable', 'style' => 'width:100%;'])}}
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
</section>


<!-- view Modal -->
<div class="modal fade" id="view_model_Modal" tabindex="-1" role="dialog" aria-labelledby="view_model_ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">@lang('quickadmin.order.view-title-'.$type)</h5>
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
  $(document).ready(function() {
    var DataaTable = $('#payment_transaction-table').DataTable();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('click', '.view_detail', function() {
      $("#body").prepend('<div class="loader" id="loader_div"></div>');
      $("#view_model_Modal").modal('show');
      $('.show_html').html('');
      var url = $(this).data('url');
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

      $(document).on('click',"#select-all",function (e) {
				var rows = DataaTable.rows({ 'search': 'applied' }).nodes();
				$('input[type="checkbox"]', rows).prop('checked', this.checked);
			});

  });

</script>
@endsection