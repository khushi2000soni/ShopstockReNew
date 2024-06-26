@extends('layouts.print-view.print-layout')
@section('title')@lang('quickadmin.user-management.fields.list-title')@endsection

@section('custom_css')
<!-- <style>
    @media print {
    @page {
        size: A5;
        margin:0 auto;
    }

    html, body {
        margin: 0;
        padding: 0;
    }

    body{
        display: flex;
        align-items: center;
        justify-content: start;
        flex-direction:column;
    }

    html
    {
        zoom:75%;
    }

    table{
        width: 100%;
    }
}
</style> -->
@endsection

@section('content')
    <div class="page-header">
        <header style="padding: 1px 0;">
            <h2 style="margin: 0;color: #2a2a33;font-size: 20px;font-weight: bold; text-align:center;"><strong>@lang('quickadmin.user-management.fields.list-title')</strong></h2>
        </header>
    </div>
    {{-- <footer>
        <div class="pagenum-container"><small>Page <span class="pagenum"></span></small></div>
    </footer> --}}
    <main class="main" style="width:100%; max-width: 100%;margin: 0 auto;padding:30px 0;padding-top: 20px;">
        <table cellpadding="0" cellspacing="0"  width="100%" style="color: #000;font-size: 16px;">
            <thead>
                <tr>
                    <th style="padding: 8px;border: 1px solid #000;border-right: none;" align="left">@lang('quickadmin.qa_sn')</th>
                    <th style="padding: 8px;border: 1px solid #000;border-right: none;" align="center">@lang('quickadmin.users.fields.name')</th>
                    <th style="padding: 8px;border: 1px solid #000;border-right: none;" align="center">@lang('quickadmin.users.fields.role')</th>
                    <th style="padding: 8px;border: 1px solid #000;border-right: none;" align="center">@lang('quickadmin.users.fields.usernameid')</th>
                    {{-- <th style="padding: 8px;border: 1px solid #000;border-right: none;" align="center">@lang('quickadmin.users.fields.email')</th> --}}
                    <th style="padding: 8px;border: 1px solid #000;" align="center">@lang('quickadmin.qa_created_at')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allstaff as $key => $staff)
                    @php
                        $role = $staff->roles->first();
                    @endphp
                <tr>
                    <td style="padding: 8px;border: 1px solid #000;border-right: none;border-top: none;" align="left">{{ $key + 1 }}</td>
                    <td style="padding: 8px;border: 1px solid #000;border-right: none;border-top: none;" align="center">{{ $staff->name ?? '' }}</td>
                    <td style="padding: 8px;border: 1px solid #000;border-right: none;border-top: none;" align="center">{{ $role ? $role->name : '' }}</td>
                    <td style="padding: 8px;border: 1px solid #000;border-right: none;border-top: none;" align="center">{{ $staff->username ?? '' }}</td>
                    {{-- <td style="padding: 8px;border: 1px solid #000;border-right: none;border-top: none;" align="center">{{ $staff->email ?? '' }}</td> --}}
                    <td style="padding: 8px;border: 1px solid #000;border-top: none;" align="center">{{ $staff->created_at ? $staff->created_at->format('d-m-Y h:i A') : '' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Record Found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </main>

@endsection
