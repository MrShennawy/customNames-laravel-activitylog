@extends('layouts.app')

@section('title')
	سجل العمليات
@endsection

@section('header')
@endsection
@inject('logCtrl','\App\Http\Controllers\LogController')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption col-md-9">
          عرض العمليات 
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>مكان العمليه</th>
                  <th>نوع العمليه</th>
                  <th>قام بالعمليه </th>
                  <th>الادوات</th>
                </tr>
              </thead>
              <tbody>
                @php $num =1 @endphp
                @foreach($acts as $act)
                  <tr>
                    <td>{{$num++}}</td>
                    <td>{{$logCtrl->multipleLogs()[$act->log_name]}}</td>
                    <td>{{$logCtrl->eventLogs()[$act->description]}}</td>
                    @if($user = \App\User::where('id',$act->causer_id)->get()->first())
                    <td><a href="{{url('users/'.$user->id.'/edit')}}"> {{$user->name}}</a></td>
                    @else
                    <td>مستخدم محذوف أو زائر</td>
                    @endif
                    <td>
                      <a href="{{url('logs/'.$act->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> التفاصيل </a>
                    </td>
                  </tr>
                @endforeach                    
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->

@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">
</script>

@endsection