@extends('layouts.app')

@section('title')
	تعديل بنك
@endsection

@section('header')


@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption col-md-9">
                <span>تعديل</span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
          {!! FORM::model($bank,['route' => ['banks.update' , $bank->id],'method'=> 'PATCH']) !!}
            @include('banks.form')
          {!! FORM::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

<!-- footer -->
@section('footer')

@endsection

