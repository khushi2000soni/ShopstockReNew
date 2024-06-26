@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('title')@lang('quickadmin.user-management.title')@endsection
@section('customCss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('admintheme/assets/css/printView-datatable.css')}}">
@endsection

@section('main-content')
<style type="text/css">
    .cart_filter_box {
        border-bottom: 1px solid #e5e9f2;
        padding-bottom: 4px;
    }
</style>
<section class="section roles" style="z-index: unset">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4> @lang('quickadmin.user-management.title')</h4>
                        <div class="">
                            @if ($type != 'deleted')
                            <div class="row align-items-center">
                                <div class="col-auto pr-1">
                                    @can('staff_create')
                                    <button type="button" class="addnew-btn addRecordBtn sm_btn circlebtn" data-toggle="modal" data-target="#centerModal" data-href="{{ route('staff.create')}}"><x-svg-icon icon="add" /></button>
                                    @endcan
                                </div>
                                <div class="col-auto pl-1">
                                    @can('staff_print')
                                    <a href="{{ route('staff.print') }}" class="printbtn btn h-10 col circlebtn" id="print-button"><x-svg-icon icon="print" /></a>
                                    @endcan
                                </div>
                            </div>
                            @endif
                        </div>
                      </div>
                    <div class="card-body">

                    <div class=" fixed_Search">
                        {{$dataTable->table(['class' => 'table dt-responsive', 'style' => 'width:100%;','id'=>'dataaTable'])}}
                    </div>
                </div>
            </div>
            <div class="popup_render_div"></div>
        </div>
    </div>
    </div>
</section>
@endsection


@section('customJS')
{!! $dataTable->scripts() !!}
<script src="{{ asset('admintheme/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admintheme/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('admintheme/assets/js/page/datatables.js') }}"></script>


<script>
    $(document).ready(function() {
        var DataaTable = $('#dataaTable').DataTable();
        $('#print-button').printPage();
        // Page show from top when page changes
        $(document).on('draw.dt', '#dataaTable', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });

        $(document).on('click', '.addRecordBtn', function() {
            // $('#preloader').css('display', 'flex');
            var hrefUrl = $(this).attr('data-href');
            console.log(hrefUrl);
            $.ajax({
                type: 'get',
                url: hrefUrl,
                dataType: 'json',
                success: function(response) {
                    //$('#preloader').css('display', 'none');
                    if (response.success) {
                        console.log('success');
                        $('.popup_render_div').html(response.htmlView);
                        $('#centerModal').modal('show');
                    }
                }
            });
        });

        $("body").on("click", ".edit-users-btn", function() {
            var hrefUrl = $(this).attr('data-href');
            console.log(hrefUrl);
            $.ajax({
                type: 'get',
                url: hrefUrl,
                dataType: 'json',
                success: function(response) {
                    //$('#preloader').css('display', 'none');
                    if (response.success) {
                        console.log('success');
                        $('.popup_render_div').html(response.htmlView);
                        $('#editModal').modal('show');
                    }
                }
            });
        });

        $("body").on("click", ".edit-password-btn", function() {
            var hrefUrl = $(this).attr('data-href');
            console.log(hrefUrl);
            $.ajax({
                type: 'get',
                url: hrefUrl,
                dataType: 'json',
                success: function(response) {
                    //$('#preloader').css('display', 'none');
                    if (response.success) {
                        console.log('success');
                        $('.popup_render_div').html(response.htmlView);
                        $('#passwordModal').modal('show');
                    }
                }
            });
        });


        $(document).on('submit', '#AddForm', function(e) {
            e.preventDefault();

            $("#AddForm button[type=submit]").prop('disabled', true);
            $(".error").remove();
            $(".is-invalid").removeClass('is-invalid');
            var formData = $(this).serialize();
            var formAction = $(this).attr('action');
            $.ajax({
                url: '{{ route("staff.store") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    $('#centerModal').modal('hide');
                    var alertType = response['alert-type'];
                    var message = response['message'];
                    var title = "{{ trans('quickadmin.users.users') }}";
                    showToaster(title, alertType, message);
                    $('#AddForm')[0].reset();
                    // location.reload();
                    DataaTable.ajax.reload();
                    $("#AddForm button[type=submit]").prop('disabled', false);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    console.log(xhr.responseJSON);

                    for (const elementId in errors) {
                        $("#" + elementId).addClass('is-invalid');
                        var errorHtml = '<div><span class="error text-danger">' + errors[elementId] + '</span></';
                        $(errorHtml).insertAfter($("#" + elementId).parent());
                    }
                    $("#AddForm button[type=submit]").prop('disabled', false);
                }
            });
        });


        $(document).on('submit', '#EditForm', function(e) {
            e.preventDefault();
            $("#EditForm button[type=submit]").prop('disabled', true);
            $(".error").remove();
            $(".is-invalid").removeClass('is-invalid');
            var formData = $(this).serialize();
            var formAction = $(this).attr('action');
            console.log(formAction);

            $.ajax({
                url: formAction,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    var alertType = response['alert-type'];
                    var message = response['message'];
                    var title = "{{ trans('quickadmin.users.users') }}";
                    showToaster(title, alertType, message);
                    $('#EditForm')[0].reset();
                    //location.reload();
                    DataaTable.ajax.reload();
                    $("#EditForm button[type=submit]").prop('disabled', false);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    console.log(xhr.responseJSON);

                    for (const elementId in errors) {
                        $("#EditForm #" + elementId).addClass('is-invalid');
                        var errorHtml = '<div><span class="error text-danger">' + errors[elementId] + '</span></';
                        $(errorHtml).insertAfter($("#EditForm #" + elementId).parent());
                    }
                    $("#EditForm button[type=submit]").prop('disabled', false);
                }
            });
        });

        $(document).on('submit', '#EditPasswordForm', function(e) {
            e.preventDefault();
            $("#EditPasswordForm button[type=submit]").prop('disabled', true);
            $(".error").remove();
            $(".is-invalid").removeClass('is-invalid');
            var formData = $(this).serialize();
            var formAction = $(this).attr('action');
            console.log(formAction);

            $.ajax({
                url: formAction,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    $('#passwordModal').modal('hide');
                    var alertType = response['alert-type'];
                    var message = response['message'];
                    var title = "{{ trans('quickadmin.users.users') }}";
                    showToaster(title, alertType, message);
                    $('#EditPasswordForm')[0].reset();
                    //location.reload();
                    DataaTable.ajax.reload();
                    $("#EditPasswordForm button[type=submit]").prop('disabled', false);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    console.log(xhr.responseJSON);

                    for (const elementId in errors) {
                        $("#EditPasswordForm #" + elementId).addClass('is-invalid');
                        var errorHtml = '<div><span class="error text-danger">' + errors[elementId] + '</span></';
                        $(errorHtml).insertAfter($("#EditPasswordForm #" + elementId).parent());
                    }
                    $("#EditPasswordForm button[type=submit]").prop('disabled', false);
                }
            });
        });

        $(document).on('submit', '.deleteForm', function(e) {
            e.preventDefault();
            console.log(2);
            var formAction = $(this).attr('action');
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
                        url: formAction,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            var alertType = response['alert-type'];
                            var message = response['message'];
                            var title = "{{ trans('quickadmin.users.users') }}";
                            showToaster(title, alertType, message);
                            DataaTable.ajax.reload();
                            // location.reload();

                        },
                        error: function(xhr) {
                            // Handle error response
                            swal("{{ trans('quickadmin.users.users') }}", 'some mistake is there.', 'error');
                        }
                    });
                }
            });
        });

        // rejoin or restore
        $(document).on('click', '.rejoin-users-btn', function(e) {
            e.preventDefault();
            console.log(2);
            var formAction = $(this).data('href');
            swal({
                title: "{{ trans('messages.rejointitle') }}",
                text: "{{ trans('messages.areYouSurerejoin') }}",
                icon: 'warning',
                buttons: {
                    confirm: 'Yes, Rejoin Staff',
                    cancel: 'No, cancel',
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: formAction,
                        type: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            var alertType = response['alert-type'];
                            var message = response['message'];
                            var title = "{{ trans('quickadmin.users.users') }}";
                            showToaster(title, alertType, message);
                            DataaTable.ajax.reload();
                            // location.reload();
                        },
                        error: function(xhr) {
                            // Handle error response
                            swal("{{ trans('quickadmin.order.invoice') }}", 'Some mistake is there.', 'error');
                        }
                    });
                }
            });
        });

        // active inactive user
        // rejoin or restore
        $(document).on('click', '.active_inactive_user', function(e) {
            e.preventDefault();
            var active_inactive = $(this).data('active_inactive');
            var _id = $(this).data('id');
            var active_inactive_msg = "{{ trans('messages.are_you_sure_change_status') }}";
            if (active_inactive == "Inactive") {
                var active_inactive_msg = "{{ trans('messages.are_you_sure_change_instatus') }}";
            }
            swal({
                title: "{{ trans('messages.are_you_sure') }}",
                text: active_inactive_msg,
                icon: 'warning',
                buttons: {
                    confirm: 'Yes',
                    cancel: 'No',
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user_status_change')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            active_inactive: active_inactive,
                            _id: _id
                        },
                        success: function(response) {
                            var alertType = response['alert-type'];
                            var message = 'Status Successfully changed';
                            var title = "{{ trans('quickadmin.users.users') }}";
                            showToaster(title, alertType, message);
                            DataaTable.ajax.reload();
                        },
                        error: function(xhr) {
                            swal("{{ trans('quickadmin.order.invoice') }}", 'Some mistake is there.', 'error');
                        }
                    });
                }
            });
        });
        // active inactive user

        $(document).on('keypress', '#name', function(event) {
            var keyCode = event.keyCode || event.which;
            var inputValue = $(this).val();
            if (keyCode === 32) {
                if (inputValue.slice(-1) === ' ') {
                    event.preventDefault();
                }
            }
        });

    });

    function ChangeEyeIcon(em, id) {
        em.toggleClass("fa-eye fa-eye-slash");
        var input = $("#" + id);
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }
</script>
@endsection
