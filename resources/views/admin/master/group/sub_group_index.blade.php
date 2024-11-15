@extends('layouts.app')
@section('title')@lang('quickadmin.group_master.sub_title') @endsection
@section('customCss')
<meta name="csrf-token" content="{{ csrf_token() }}" >
<link rel="stylesheet" href="{{ asset('admintheme/assets/css/printView-datatable.css')}}">
{{-- <style>
  #select2-parent_id-results{
    margin-top: -34px;
  }
</style> --}}
@endsection
@section('main-content')

@php $isRecycle = ""; @endphp
@if(Request::is('admin/master/sub-group-recycle*'))
  @php  $isRecycle = "Yes"; @endphp
@endif


<section class="section roles" style="z-index: unset">
    <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  @if($isRecycle == "Yes")
                  <h4>@lang('quickadmin.group_master.sub_recycle')</h4>
                  @else               
                  <h4>@lang('quickadmin.group_master.sub_title')</h4> 
                    <div class="col-auto  mt-md-0 mt-3 ml-auto product_page_buttons">
                      <div class="row align-items-center">   
                        <div class="btn-column">
                          <div class="in-btn-column">
                            @can('group_create')
                              <button type="button" class="addnew-btn add_sub_group sm_btn btn circlebtn" title="@lang('messages.add_sub_group')" ><x-svg-icon icon="add-device" /></button>
                            @endcan
                          </div>
                          <div class="in-btn-column">
                            @can('group_export')
                              <a href="{{ route('admin.master.sub.group.export')}}" class="excelbtn btn h-10 col circlebtn" title="@lang('messages.excel')"  id="excel-button"><x-svg-icon icon="excel" /></a>
                            @endcan
                          </div>
                        </div>
                        <div class="btn-column">
                          <div class="in-btn-column">
                            @can('group_undo')
                              <a href="{{ route('admin.master.sub.group.recycle')}}" class="recycleicon btn h-10 col circlebtn" title="@lang('messages.undo')"  id="excel-button"><x-svg-icon icon="rejoin-btn" /></a>
                            @endcan
                          </div>
                        </div>
                      </div>
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
  </section>

<!-- Add Edit Modal -->
  <div class="modal fade" id="groupModal" role="dialog" aria-labelledby="groupModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><span class="Add_edit_group">Add</span> Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <form> --}}
          <div class="form-group">
            <div class="parent_group">
              <label>@lang('admin_master.product.group_type')</label>
              <div class="parent_group_list">

              </div>
            </div>
            
          </div>
          <div class="form-group">
            <label for="naem">Name:</label>
            <input type="hidden" class="group_edit_id">
            <input type="text" class="form-control group_edit_name" id="name" placeholder="Enter name" name="name">
            <span class="error_name text-danger error"></span>
          </div>
        {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <div class="success_error_message"></div>
          <button type="button" class="btn btn-primary save_btn">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- Add Edit Modal -->


<!-- Parent Group -->
<div class="modal fade" id="parentGroupModel" tabindex="-1" role="dialog" aria-labelledby="parentGroupModelTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="parentexampleModalLongTitle">Add</span> Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="anme">Name:</label>
          <input type="text" class="form-control " id="parent_name" placeholder="Enter name" name="name">
          <span class="error_parent_name text-danger error"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="success_error_message"></div>
        <button type="button" class="btn btn-primary save_parent">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Parent Group -->


@endsection

@section('customJS')
{!! $dataTable->scripts() !!}
<script src="{{ asset('admintheme/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/js/page/datatables.js') }}"></script>

<script type="text/javascript">
    // add or edit
      $(document).ready(function(){
        var DataaTable = $('#group-table').DataTable();
          $(document).on('click','.add_group',function(){
            $('.parent_group').css('display','none');
            $('.error').html('');
            $("#groupModal").modal('show');
            $(".group_edit_id").val('');
            $(".group_edit_name").val('');
            $(".save_btn").html('Save');
            $(".Add_edit_group").html('Add');
            getParentGroup();
            $('.save_btn').prop('disabled', false);
          });
          $(document).on('click','.add_sub_group',function(){
            $('.parent_group').css('display','block');
            $('.error').html('');
            $("#groupModal").modal('show');
            $(".group_edit_id").val('');
            $(".group_edit_name").val('');
            $(".save_btn").html('Save');
            $(".Add_edit_group").html('Add Sub');
            getParentGroup();
            $('.save_btn').prop('disabled', false);
          })
          $(document).on('click','.edit_group',function(){
            var parent_group_id = $(this).data('parent_id');
            $('.parent_group').css('display','none');
            $('.error').html('');
            $("#groupModal").modal('show');
            $(".group_edit_id").val($(this).data('id'));
            $(".group_edit_name").val($(this).data('name'));
            $(".save_btn").html('Update');
            $(".Add_edit_group").html('Edit');
            $('.save_btn').prop('disabled', false);
           // getParentGroup($(this).data('parent_id'));
           getParentGroup(parent_group_id);
          })
     
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        // $(document).on('keyup', function(e) {
        //   if (e.key === 'Enter') {
        //     $('#group_form').submit();
        //   }
        // });
          $(document).on('click',".save_btn", function(e) {
            e.preventDefault();
            var parent_id = $("#parent_id").val() ?? 0;
            var name = $("#name").val();
            var _id = $(".group_edit_id").val();
            var add_type = $(".Add_edit_group").html();
            $('.save_btn').prop('disabled', true);
            var postType = "POST";
            var post_url = "{{ route('admin.master.groups.store') }}";
            if(_id){
               var post_url = "{{ route('admin.master.groups.update',['group'=> ':groupId']) }}";
                post_url = post_url.replace(':groupId', _id);
               var postType = "PUT";
            }
            $.ajax({
              type: postType,
              url: post_url,
              data: {
                name: name,
                id: _id,
                parent_id: parent_id,
                add_type: add_type,
              },
              success: function(data) {
                $('.save_btn').prop('disabled', false);
                if ($.isEmptyObject(data.error)) {
                   $("#groupModal").modal('hide');
                    DataaTable.ajax.reload();
                    var alertType = "{{ trans('quickadmin.alert-type.success') }}";
                    var message = data.success;
                    var title = "Group";
                    showToaster(title,alertType,message);              
                } else {
                  printErrorMsg(data.error);
                }
              }
            });
          });
          function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
              $(`.error_${key}`).html(value);
            });
          }
    // add or edit
    // delete
          $(document).on('click','.delete_group',function(){
            var delete_id = $(this).data('id');
            var delete_url = "{{ route('admin.master.groups.destroy',['group'=> ':groupId']) }}";
            delete_url = delete_url.replace(':groupId', delete_id);
          swal({
            title: "Are  you sure?",
            text: "are you sure want to delete?",
            icon: 'warning',
            buttons: {
              confirm: 'Yes, delete',
              cancel: 'No, cancel',
            },
            dangerMode: true,
            }).then(function(willDelete) {
                if(willDelete) {  
                    $.ajax({
                    type: "DELETE",
                    url: delete_url,              
                    success: function(data) {
                      if ($.isEmptyObject(data.error)) {
                        DataaTable.ajax.reload();
                        var alertType = "{{ trans('quickadmin.alert-type.success') }}";
                        var message = "{{ trans('messages.crud.delete_record') }}";
                        var title = "Group";
                        showToaster(title,alertType,message);   
                      } 
                    },
                    error: function (xhr) {
                      swal("{{ trans('quickadmin.order.invoice') }}", 'Some mistake is there.', 'error');
                    }
                  });
                } 
              })              
          });
    // delete
    // recycle
          $(document).on('click','.recycle_group',function(){
            var recycle_id = $(this).data('id');
          swal({
            title: "Are  you sure?",
            text: "are you sure want to Undo?",
            icon: 'warning',
            buttons: {
              confirm: 'Yes, Undo',
              cancel: 'No, cancel',
            },
            dangerMode: true,
            }).then(function(willDelete) {
                if(willDelete) {  
                    $.ajax({
                    type: "POST",
                    url: "{{ route('admin.master.groups.undo')}}", 
                    data:{recycle_id:recycle_id},             
                    success: function(data) {
                      if ($.isEmptyObject(data.error)) {
                        DataaTable.ajax.reload();
                        var alertType = "{{ trans('quickadmin.alert-type.success') }}";
                        var message = "{{ trans('messages.crud.delete_record') }}";
                        var title = "Group";
                        showToaster(title,alertType,message);   
                      } 
                    },
                    error: function (xhr) {
                      swal("{{ trans('quickadmin.order.invoice') }}", 'Some mistake is there.', 'error');
                    }
                  });
                } 
              })              
          });
    // recycle
})

 function getParentGroup(parent_id){
      $.ajax({
            type: "GET",
            url: "{{ route('admin.master.get_group_parent')}}",
            data:{parent_id:parent_id},
            success: function(data) {
                $('.parent_group').css('display','block');
                $('.parent_group_list').html(data.html);
                setTimeout(() => {
                  $('#parent_id').select2({});                  
                }, 500);
                $('#parent_id').select2({}).on('select2:open', function() {
                    let a = $(this).data('select2');
                    if (!$('.select2-group_add').length) {
                        a.$results.parents('.select2-results').append('<div class="select2-group_add select_2_add_btn"><button class="btns addNewGroupBtn get-customer"><i class="fa fa-plus-circle"></i> Add New</button></div>');
                    }
                });
            }
        });
}

$(document).ready(function(){
    $(document).on('click','.addNewGroupBtn',function(){
      $('.save_parent').prop('disabled', false);
      $("#parentGroupModel").modal('show');
      $("#parent_id").select2('close');
      $("#parent_name").val('');
      $('.error').html('');
    });
    $(document).on('click', ".save_parent", function(e) {
            e.preventDefault();
            var name = $("#parent_name").val();
            $('.save_parent').prop('disabled', true);
            var postType = "POST";
            var post_url = "{{ route('admin.master.groups.store') }}";
            $.ajax({
              type: postType,
              url: post_url,
              data: {
                name: name,
                add_type: "",
              },
              success: function(data) {
                $('.save_parent').prop('disabled', false);
                if ($.isEmptyObject(data.error)) {
                  var newOption = new Option(data.group.name, data.group.id, true, true);
                  $('#parent_id').append(newOption).trigger('change');
                   $("#parentGroupModel").modal('hide');
                    var alertType = "{{ trans('quickadmin.alert-type.success') }}";
                    var message = data.success;
                    var title = "Parent Group";
                    showToaster(title,alertType,message);              
                } else {
                  GroupAddprintErrorMsg(data.error);
                }
              }
            });
          });
});

function GroupAddprintErrorMsg(msg) {
      $.each(msg, function(key, value) {
        $(`.error_parent_name`).html(value);
      });
    }
</script>

@endsection
