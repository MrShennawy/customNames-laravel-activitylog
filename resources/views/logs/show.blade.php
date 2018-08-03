  @extends('layouts.app')

  @section('title')
  تفاصيل العملية
  @endsection

  @section('header')
  @endsection
  @inject('logCtrl','\App\Http\Controllers\LogController')

  @section('content')
  <!-- BEGIN PAGE CONTENT-->
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable-line">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_1_1" data-toggle="tab">
            التفاصيل  </a>
          </li>
        </ul>
            <div class="tab-content">
              <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                <div class="portlet light">
                  <div class="portlet-body">
                    <div class="row inbox">
                      <div class="col-md-2">
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                          <div class="profile-usertitle-job">
                            مكان العملية : {{$logCtrl->multipleLogs()[$act->log_name]}}
                          </div>
                          <hr>
                          <div class="profile-usertitle-name">
                          نوع العملية : {{$logCtrl->eventLogs()[$act->description]}}
                         </div>
                          <hr>
                          <div class="profile-usertitle-name">
                          قام بالعملية : 
                          @if($user = \App\User::where('id',$act->causer_id)->get()->first())
                          <a href="{{url('admincp/users/'.$user->id.'/edit')}}"> {{$user->name}}</a>
                          @else
                          مستخدم محذوف أو زائر
                          @endif
                         </div>
                        <hr>
                     </div>
                     <!-- END SIDEBAR USER TITLE -->
                   </div>
                   <div class="col-md-10">
                    <div class="inbox-view">
                      <p>
                      @if(count($act->properties))
                      @if(in_array($act->description, ['deleted','forceDeleted','created','restored']))
                        <p style="color:red"> عرض البيانات </p> 
                        <table class="table table-striped table-bordered table-hover table-header-fixed">
                            <thead>
                              <tr>
                                <th>إسم الحقل</th>
                                <th>عرض بيانات الحقل</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($act->properties['attributes'] as $key => $val)
                                <tr class="logData">
                                  <td>{{$key}}</td>
                                  <td>{{$val}}</td>
                                </tr>
                              @endforeach                    
                            </tbody>
                        </table>
                      @elseif($act->description == 'updated')
                        <table class="table table-striped table-bordered table-hover table-header-fixed">
                            <thead>
                              <tr>
                                <th>مكان التعديل</th>
                                <th>البيانات السابقه</th>
                                <th>البيانات الحاليه</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($act->properties['old'] as $key => $val)
                                <tr class="logData">
                                  <td>{{$key}}</td>
                                  <td class="oldVal">{{$val}}</td>
                                  <td class="curVal">{{$act->properties['attributes'][$key]}}</td>
                                </tr>
                              @endforeach                    
                            </tbody>
                        </table>
                      @endif
                      @else
                      <span style="color: red">لا توجد بيانات ليتم عرضها</span>
                      @endif
                      </p>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  <!-- footer -->
  @section('footer')
  <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
  {!! HTML::script('public/js/code-style.js') !!}
  <script type="text/javascript">
    $('.logData td').each(function(){
      console.log();
      if($(this).hasClass('oldVal')){
        if($(this).text() != $(this).next('td').text()){
          $(this).parent('tr').css('color','red');
        }
      }
    })
  </script>
  @endsection

