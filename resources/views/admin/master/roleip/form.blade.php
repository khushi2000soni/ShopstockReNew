<?php

use Illuminate\Support\Collection; ?>
<div class="col-md-12">
    <div class="form-group">
        <label>@lang('quickadmin.ip.fields.addIp') <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="ip_address" value="{{ isset($role_ip) ? $role_ip->ip_address : '' }}" id="ip_address" autocomplete="true" placeholder="@lang('quickadmin.ip.fields.addIp')">
        </div>
        <div class="error_ip_address text-danger error"></div>
    </div>

    <div class="form-group">
        <label>@lang('quickadmin.ip.fields.roles') <span class="text-danger">*</span></label>
        <div class="row">
            @foreach($allRoles as $role)
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    @php $isChecked = ""; @endphp
                    @if(isset($RoleIpPermission))
                    @php
                    $values = collect($RoleIpPermission);
                    $searchValue = $role->id;
                    @endphp
                    @if ($values->contains($searchValue))
                    @php $isChecked = "checked"; @endphp
                    @endif
                    @endif
                    <input type="checkbox" class="custom-control-input permission-checkbox" name="roles[]" value="{{ $role->id }}" id="permission{{ $role->id }}" {{$isChecked}}>
                    <label class="custom-control-label" for="permission{{ $role->id }}">{{ $role->name }}</label>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<div class="col-md-12">
    <input type="submit" class="btn btn-primary save_btn" value="@lang('admin_master.g_submit')">
</div>




@section('customJS')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('keyup', function(e) {
            if (e.key === 'Enter') {
                $('#roleForm').submit();
            }
        });

        $(document).on('submit', "#roleForm", function(e) {
            e.preventDefault();
            $('.error').html('');
            var action = $(this).attr('action');
            var method = $(this).attr('method');
            var formData = new FormData($("#roleForm")[0]);
            $('.save_btn').prop('disabled', true);
            formData.append('_method', method);

            $.ajax({
                type: "POST",
                url: action,
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        var alertType = "{{ trans('quickadmin.alert-type.success') }}";
                        var message = data.success;
                        var title = "Group";
                        showToaster(title, alertType, message);
                        setTimeout(() => {
                            window.location.replace("{{route('admin.master.role_ip.index')}}");
                        }, 1500);
                    } else {
                        $('.save_btn').prop('disabled', false);
                        printErrorMsg(data.error);
                    }
                },
                error: function(data) {
                    $('.save_btn').prop('disabled', false);
                }
            });
        });
    })

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            $(`.error_${key}`).html(value);
        });
    }
</script>
@endsection