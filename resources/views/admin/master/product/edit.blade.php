@extends('layouts.app')
@section('title')@lang('admin_master.product.seo_title') @endsection
@section('customCss')
<meta name="csrf-token" content="{{ csrf_token() }}" >
@endsection
@section('main-content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Product Edit</h4>
            </div> 
            <div class="card-body">
            <form action="{{ route('admin.master.products.update',['product'=>$product->id]) }}" method="PUT" id="productFormMain" name="productFormMain" enctype="multipart/form-data">
              <div class="row">
                @include('admin.master.product.form')
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
