@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">

<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<!-- Timetable CSS Files -->
<link rel="stylesheet" href="vendors/timetables/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/timetables/css/timetable.css">

<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">

<!--------------------------------------------------->

<!----------- CSS Files for example -------------->
<link href="/vendors/timetables/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="/vendors/timetables/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="/css/bootstrap-glyphicons.css" rel="stylesheet" type="text/css" />



<style media="screen">

#YTO {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: 'Byekan'!important;
  height: 500px!important;
}
#OTY {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: 'Byekan'!important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
}

/* asiye added */
.witheColor{
    color: #6c757d !important;
}


</style>
@endsection

@section('content')

<!--  Start Add Task PopUp -->
<div class="modal fade text-left" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">???????????? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">

            <input type="text" name="status" value="?????????? ????????" hidden>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">?????? ???????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name"   class="form-control" name="name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">?????? </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">?????????? ?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo[]" class="selectize-event required" multiple>
                  <option class="" value="">???????????? ??????????</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" value="????????">????????</option>
                  <option class="form-control" value="??????????">??????????</option>
                  <option class="form-control" value="??????">??????</option>
                  <option class="form-control" value="????????">????????</option>
                </select>
              </div>

            </div>
            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">???????? ??????????</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>

          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ???????????? ????????????
            </button>
            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                <i class="ft-x"></i> ??????
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  End Add Task PopUp -->





<!--  Start Edit Task Assigned to Me -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="editTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">?????????????????? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="/Newtdl/updateFromDoer/{{ $tdlAssignedToThisUser->id }}"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          @csrf
          @method('PUT')
          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">????????</label>
              <div class="col-md-9">
                <input type="text" id="id" value="{{ $tdlAssignedToThisUser->id }}" class="form-control" name="id" >
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">?????? ????????????</label>
              <div class="col-md-9">
                <input type="text" id="name" value="{{ $tdlAssignedToThisUser->name }}" class="form-control" name="name" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">??????</label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30" disabled >{{ $tdlAssignedToThisUser->description }}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">?????????? ??????????</label>
              <div class="col-md-9">
                <input type="text" id="assignerName" value="{{ $tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family }}" class="form-control" name="assignerName" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">??????????</label>
              <div class="col-md-9">
                <input type="text" id="priority" value="{{ $tdlAssignedToThisUser->priority }}" class="form-control" name="priority" disabled>
              </div>
            </div>


            @foreach ($tdlAssignedToThisUser->users as $user)
                @if($user->id == auth()->user()->id)
                    <input type="text" hidden value="{{$user->pivot->id}}" name="newtdl_id">

                    <p style="padding: 30px; color: red;" > * ???????????? ?????????? ?????? ??????  ???????????? ?????? ?????????? ???? ???? ???????????????? ?? ???????????? ???????? ???? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????????? .    * </p>
                    <div class="form-group row">
                    <label class="col-md-3 label-control" for="status">?????????? ?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
                    <div class="col-md-9">
                        <select class="form-control" name="status">
                        <option class="form-control" disabled {{ $user->pivot->status == '?????????? ????????' ? 'selected' : "" }} value="?????????? ??????????">  ?????????? ???????? </option>
                        <option class="form-control" {{ $user->pivot->status == '?????????? ??????????' ? 'selected' : "" }} value="?????????? ??????????"> ?????????? ?????????? </option>
                        <option class="form-control" {{ $user->pivot->status == '?????????? ??????' ? 'selected' : "" }} value="?????????? ??????">?????????? ??????</option>
                        <option class="form-control" {{ $user->pivot->status == '??????????' ? 'selected' : "" }} value="??????????">??????????</option>
                        </select>
                    </div>
                    </div>



                    <div class="form-group row last">
                    <label class="col-md-3 label-control" for="result">??????????<sup style="color: red; font-size: 18px" >*</sup></label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="result" rows="3" cols="30">{{ $user->pivot->result }}</textarea>
                    </div>
                    </div>


                    <div  class="form-group row last">
                        <label class="col-md-3 label-control" for="attachment">???????? ??????????</label>
                        <div class="col-md-9">
                            <input type="file" id="attachment" class="form-control" name="attachment">
                        </div>
                    </div>

                    <div  class="form-group row last">
                        <label class="col-md-3 label-control" for="assignerAttachment">???????????? ???????? ??????????</label>
                        <div class="col-md-9">
                            <a target="_blank" href="/{{ $user->pivot->attachment }}">
                                 {!! isset($user->pivot->attachment) && $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "???????? ????????" !!}
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach


          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ??????????????????
            </button>

            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
              <i class="ft-x"></i> ??????
            </button>

          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Me -->

<!--  Start Edit Task Assigned to Me -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="showTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">???????????? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center"  class="form form-horizontal form-bordered striped-rows">

          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">????????</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->id }}
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">?????? ????????????</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->name }}
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">??????</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->description }}
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">?????????? ??????????</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family }}
              </div>
            </div>


              @foreach ($tdlAssignedToThisUser->users as $user)
              <div class="form-group row">
                  <label class="col-md-3 label-control">?????????? ?????? ??????????</label>
                  <div class="col-md-9 text-left">
                      {{ $user->name  . " " . $user->family }}
                      <span class="badge {{ $user->pivot->status == '?????????? ??????' ? 'badge-success' : 'badge-warning' }}">
                          {{ $user->pivot->status }}
                      </span>
                      ???????? ?????????? :
                      <a target="_blank" href="{{ $user->pivot->attachment }}">
                          {!! $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "" !!}
                      </a>
                      ?????????? :
                      <span>{{ $user->pivot->result ?? '---' }}</span>
                  </div>
              </div>
          @endforeach


          <div class="form-group row">
              <label class="col-md-3 label-control"> ??????????  </label>
              <div class="col-md-9">
                  <span class="badge badge-{{$tdlAssignedToThisUser->priority_button}}">
                      {{ $tdlAssignedToThisUser->priority ?? ''}}
                  </span>
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control" for="result"> ?????????????? ?????????? ?????????? </label>
              <div class="col-md-9">
                  <a target="_blank" href="{{ $tdlAssignedToThisUser->doerAttachment }}"> {!! $tdlAssignedToThisUser->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
              </div>
          </div>



          <div class="form-group row">
              <label class="col-md-3 label-control">?????????? ??????????  </label>
              <div class="col-md-9">
                  {{ jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d') ?? ''}}
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">?????????????? ?????????? ??????????   </label>
              <div class="col-md-9">
                  {{ $tdlAssignedToThisUser->descriptionAssigner ?? ''}}
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">?????????? ?????????? ?????????? ??????????   </label>
              <div class="col-md-9">
                  <span class="badge badge-{{$tdlAssignedToThisUser->status_button ?? ''}}">
                  {{ $tdlAssignedToThisUser->status ?? ''}}
                  </span>
              </div>
          </div>

          </div>


        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Me -->


<!--  Start Edit Task Assigned to Other -->
@foreach($tdlsAssignedToOther as $tdlAssignedToOther)
<div class="modal fade text-left" id="EditOtherTask{{ $tdlAssignedToOther->id }}" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask{{ $tdlAssignedToOther->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">?????????????????? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl/updateAssignedToOther/{{$tdlAssignedToOther->id }}" class="form form-horizontal form-bordered striped-rows">
          @csrf
          @method('PUT')
          <div class="form-body">

            <input type="text" name="status" value="{{ $tdlAssignedToOther->status  }}" hidden>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">?????? ???????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name" value=" {{ $tdlAssignedToOther->name  }} "  class="form-control" name="name">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">?????? </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30">{{ $tdlAssignedToOther->description  }}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">?????????? ?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo[]" class="selectize-event required" multiple>
                  <option class="" value="">???????????? ??????????</option>
                  @foreach($users as $user)
                    <option value="{{ $user->id }}" {{in_array($user->id, $tdlAssignedToOther->users->pluck('id')->toArray()) ? 'selected' : ''}}>{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "????????" ? "selected"  : ""  }}  value="????????">????????</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "??????????" ? "selected"  : ""  }} value="??????????">??????????</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "??????" ? "selected"  : ""  }} value="??????">??????</option>
                  <option class="form-control" {{  $tdlAssignedToOther->priority == "????????" ? "selected"  : ""  }} value="????????">????????</option>
                </select>
              </div>

            </div>

            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">???????? ??????????</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="assignerAttachment">???????????? ???????? ??????????</label>
                <div class="col-md-9">
                    <a target="_blank" href="/{{ $tdlAssignedToOther->assignerAttachment }}">
                         {!! $tdlAssignedToOther->assignerAttachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "???????? ????????" !!}
                    </a>
                </div>
            </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ????????????
            </button>


            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                <i class="ft-x"></i> ??????
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Other -->



<!--  Start Edit EditOtherTaskForAssigner -->
@foreach($tdlsAssignedToOther as $tdlAssignedToOther)
    @foreach($tdlAssignedToOther->users as $user)
        <div class="modal fade text-left" id="EditOtherTaskForAssigner{{ $tdlAssignedToOther->id }}User{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask{{ $tdlAssignedToOther->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div   class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">?????????? ???????????? ?????????? ?????? ???? ?????? {{ $tdlAssignedToOther->name ?? ''}} ???? {{$user->name . ' '. $user->family}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="font-family:Byekan; direction: rtl" class="modal-body">

                <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl/updateAssignerStatus/{{$tdlAssignedToOther->id}}" class="form form-horizontal form-bordered striped-rows">
                @csrf
                @method('PUT')
                <div class="form-body">

                    <input style="display: none" value="{{  $tdlAssignedToOther->id }}" name="id" hidden type="text">
                    <input style="display: none" value="{{  $user->pivot->id }}" name="pivot_id" hidden type="text">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="statusAssigner">?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
                        <div class="col-md-9">
                        <select class="form-control" name="statusAssigner" >
                            <option class="form-control" > ???????????? ????????</option>
                            <option class="form-control" {{  $user->pivot->statusAssigner == "?????????? ??????" ? "selected"  : ""  }}  value="?????????? ??????">?????????? ??????</option>
                            <option class="form-control" {{  $user->pivot->statusAssigner == "???? ??????" ? "selected"  : ""  }} value="???? ??????">???? ??????</option>
                            <option class="form-control" {{  $user->pivot->statusAssigner == "??????????" ? "selected"  : ""  }} value="??????????">??????????</option>
                            <option class="form-control" {{  $user->pivot->statusAssigner == "?????????? ??????????" ? "selected"  : ""  }} value="?????????? ??????????">?????????? ??????????</option>
                        </select>
                        </div>

                    </div>

                    <div class="form-group row">
                    <label class="col-md-3 label-control" for="descriptionAssigner">?????????????? ?????????? </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="descriptionAssigner" rows="3" cols="30">{{ $user->pivot->descriptionAssigner  }}</textarea>
                    </div>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                    <i class="fa fa-check-square-o"></i>??????????????????
                    </button>


                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="ft-x"></i> ??????
                    </button>
                </div>
                </form>

            </div>
            </div>
        </div>
        </div>
    @endforeach
@endforeach
<!--  End Edit EditOtherTaskForAssigner -->



<!--  Start ReferralsTdl -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $tdlAssignedToThisUser->id }}">?????????? ???????????? ???? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="Tdl/updateDoer"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">

            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">????????</label>
              <div class="col-md-9">
                <input type="text" id="id" value="{{ $tdlAssignedToThisUser->id }}" class="form-control" name="id" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">?????????? ?????????? <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">???????????? ??????????</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                  @endforeach
                </select>

              </div>
            </div>




          </div>



          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ??????????????????
            </button>

            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                <i class="ft-x"></i> ??????
              </button>

          </div>
        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End ReferralsTdl -->


<!--  Start DetailOtherTaskAssigned to Other -->
@foreach($tdlsAssignedToOther as $tdlAssignedToOther)
<div class="modal fade text-left" id="DetailOtherTask{{ $tdlAssignedToOther->id }}" tabindex="-1" role="dialog" aria-labelledby="DetailOtherTask{{ $tdlAssignedToOther->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">????????????  ???????????? ?????? ?????????? ???????? ?????? ???? ?????? ?????? ???? ???????????? </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">????????  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->id ?? ''}}
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">  ?????? ????????????  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->name ?? ''}}

                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control">??????  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->description ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">?????????? ??????????  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family }}
                </div>
            </div>


            @foreach ($tdlAssignedToOther->users as $user)
                <div class="form-group row">
                    <label class="col-md-3 label-control">?????????? ?????? ??????????</label>
                    <div class="col-md-9 text-left">
                        {{ $user->name  . " " . $user->family }}
                        <span class="badge {{ $user->pivot->status == '?????????? ??????' ? 'badge-success' : 'badge-warning' }}">
                            {{ $user->pivot->status }}
                        </span>
                        ???????? ?????????? :
                        <a target="_blank" href="{{ $user->pivot->attachment }}">
                            {!! $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "" !!}
                        </a>
                        ?????????? :
                        <span>{{ $user->pivot->result ?? '---' }}</span>
                    </div>
                </div>
            @endforeach


            <div class="form-group row">
                <label class="col-md-3 label-control"> ??????????  </label>
                <div class="col-md-9">
                    <span class="badge badge-{{$tdlAssignedToOther->priority_button}}">
                        {{ $tdlAssignedToOther->priority ?? ''}}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="result"> ?????????????? ?????????? ?????????? </label>
                <div class="col-md-9">
                    <a target="_blank" href="/{{ $tdlAssignedToOther->assignerAttachment }}">
                        {!! $tdlAssignedToOther->assignerAttachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "???????? ????????" !!}
                   </a>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">?????????? ??????????  </label>
                <div class="col-md-9">
                    {{ jdate($tdlAssignedToOther->created_at)->format('Y/m/d') ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">?????????????? ?????????? ??????????   </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->descriptionAssigner ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">?????????? ?????????? ?????????? ??????????   </label>
                <div class="col-md-9">
                    <span class="badge badge-{{$tdlAssignedToOther->status_button ?? ''}}">
                    {{ $tdlAssignedToOther->status ?? ''}}
                    </span>
                </div>
            </div>

        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Other -->


<!--  Start detail  status Assigned to Me showDetailStatusAssigner -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="showDetailStatusAssigner{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">???????????? ????????????</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center"  class="form form-horizontal form-bordered striped-rows">
          <div class="form-body">

            @foreach ($tdlAssignedToThisUser->users as $user)
            @if ($user->id == auth()->user()->id)
                <div class="form-group row">
                    <label class="col-md-3 label-control"> ?????????????? ?????????? ??????????  </label>
                    <div class="col-md-9">
                        {{ $user->pivot->descriptionAssigner ?? ''}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">?????????? ?????????? ?????????? ??????????   </label>
                    <div class="col-md-9">
                        <span class="badge badge-{{ $user->status_assigner_pivot }}">
                            {{ $user->pivot->statusAssigner }}
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">?????????? ??????  </label>
                    <div class="col-md-9">
                        {{ jdate($user->pivot->updated_at)->format('Y/m/d') ?? ''}}
                    </div>
                </div>
                @endif
            @endforeach
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End detail  status Assigned to Me-->


<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

        <?php
            $datetime1 = new \DateTime();//start time
            $datetime2 = new \DateTime('2023-03-21 24:54:00');//end time
            $interval = $datetime1->diff($datetime2);
        ?>
        <div style="font-family:Byekan" class="alert alert-success">
            <ul>
             <p> {{ $interval->format(' %m ?????? %d ?????? %H ???????? %i ?????????? %s ?????????? ?????????? ???? ?????????? ?????? 1402') }}</p>
            </ul>
        </div>


        @if (count($baners) > 0)
        @foreach($baners as $baner)
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ $baner->title ?? '' }} </strong>
                {{ $baner->description ?? '' }}
                <p style="text-align: left">{{ $baner->addedByName ?? '' }}</p>
                <p style="text-align: right">{{jdate($baner->created_at)}}</p>
               @if($baner->file != "storage/Baners/Nothing")
                    <p style="text-align:center;color: #3BAFDA">
                        ???????????? ???????? ??????????:
                        <a target="_blank" href="{{ $baner->file }}">
                            <i style="font-size: 20px" class="ft-file-text"></i>
                        </a>
                    </p>
                @endif
            </div>
          @endforeach
        @endif


      @if ($errors->any())
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if ($box['7'])
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
            <li>{{auth()->user()->name .' '. auth()->user()->family}} ?????? {{ $box['7'] }} ???????????? ?????????? ???????? ???? ?????? ?????? ?????????? ???????? ???????????? ?????? ?????? ???? ?????????? ????????</li>
        </ul>
      </div>
      @endif


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);border-radius: 0.25rem;background-color: #f8f9fa;">
                <div class="row">
                  <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-clipboard font-large-1 float-left mt-1 text-white witheColor"></i>
                        <span class="font-large-1 text-bold-300 info float-right" style="color:#007bff !important">{{ $box['1'] }}</span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">???????????? ?????? ???????? ?????? ?????????? ??????</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#007bff !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-check-circle font-large-1 float-left text-white mt-1 witheColor"></i>
                        <span class="font-large-1 text-bold-300 info float-right" style="color:#007bff !important">{{ $box['2'] }}</span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">???????????? ?????? ?????????? ?????? ?????????? ??????</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#007bff !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>



                  <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-check-circle font-large-1 text-white float-left mt-1 witheColor"></i>
                        <span class="font-large-1 text-bold-300 warning float-right"> {{ $box['5'] }} </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">???????????? ?????? ???????? ?????? ?????? ?????? ??????</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12">
                    <div class="pb-1">
                      <div class="clearfix mb-1">
                        <i class="ft-clipboard font-large-1 text-white float-left mt-1 witheColor"></i>
                        <span class="font-large-1 text-bold-300 warning float-right"> {{ $box['6'] }} </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">???????????? ?????? ?????????? ?????? ?????? ?????? ??????</span>
                      </div>
                    </div>
                    <div class="progress mb-0" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>






      <!-- Start My Assigned Tasks To Other Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">???????????? ?????? ?????????? ???????? ?????? ???? ?????? ?????? ???? ????????????</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i>  ???????????? ????????????  </span></button><br><br>
                <div class="card-body card-dashboard">
                  <p class="card-text">???? ?????? ???????? ???????????????? ???????????? ???????? ???? ???? ???????????? ?????????? ???????? ?????? ???? ?????????? ????????????.</p>
                  <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>????????</th>
                        <th>?????? ????????????</th>
                        <th>?????????? ??????????</th>
                        <th>?????????? ??????????</th>
                        <th>??????????</th>
                        <th>?????????? ??????????</th>
                       <th>?????????? ??????????</th>
                        <th>????????????</th>
                        <th>??????</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      @foreach($tdlsAssignedToOther as $tdlAssignedToOther)
                      <tr>
                        <td>{{ $tdlAssignedToOther->id }}</td>
                        <td style="white-space: pre-wrap"><a style="color:#007bff !important" data-toggle="modal" data-target="#DetailOtherTask{{ $tdlAssignedToOther->id }}">{{ $tdlAssignedToOther->name ?? '' }}</a></td>


                        <td>{{ $tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family }}</td>
                        <td style="white-space:normal">
                            @foreach ($tdlAssignedToOther->users as $user)
                                @if($user->pivot->status == '?????????? ??????')
                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $tdlAssignedToOther->id }}User{{$user->id}}" >
                                        {{ $user->name  . " " . $user->family }} -
                                    </a>
                                @else
                                    {{ $user->name  . " " . $user->family }} -
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <span class="badge badge-{{$tdlAssignedToOther->priority_button}}">
                                {{ $tdlAssignedToOther->priority ?? ''}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{$tdlAssignedToOther->status_button ?? ''}}">
                                {{ $tdlAssignedToOther->status ?? ''}}
                                </span>
                        </td>

                       <td style="direction: ltr" >{{ jdate($tdlAssignedToOther->created_at)->format('Y/m/d') }}</td>

                        <td style="text-align:center;" >
                            @if(auth()->user()->id == $tdlAssignedToOther->user->id )
                                <a data-toggle="modal" data-target="#EditOtherTask{{ $tdlAssignedToOther->id }}" >
                                    <i style="font-size: 20px; color: #007bff" class="ft-edit"></i>
                                </a>
                            @endif
                        </td>
                        <td style="text-align:center;" >
                            @if(auth()->user()->id == $tdlAssignedToOther->user->id )
                            <form action="/Newtdl/delete/{{ $tdlAssignedToOther->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('?????? ???????? ?????? ?????????????? ????????????')" >
                                    <i style="font-size: 20px;color: red" class="ft-x-square"></i>
                                </button>
                            </form>
                            @endif
                        </td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!--  End My Assigned Tasks To Other Table -->

            <!--  My Tasks Table (Activities Assigned To Me) -->
            <section>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">???????????? ?????? ?????????? ???????? ?????? ???? ??????</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show">
                      <div class="card-body card-dashboard">
                        <p class="card-text text-info">???????? ?????? ???????? ?????????? ???????????? ?????? ?????????? ???????? ?????? ???????? ???????????? ???? ?????? ????????????. ?????? ???????????????? ???? ???????? ?????????? ?????????? ?????????????? ???????????? ???????? ?????? ???? ?????????????????? ????????.</p>
                        <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                          <thead>
                            <tr style="text-align: center;">
                              <th>????????</th>
                              <th>?????? ????????????</th>
                              <th>?????????? ??????????</th>
                              <th>??????????</th>
                              <th>?????????? ??????????</th>
                              <th> ?????????? ??????</th>
                              {{-- <th>?????????? </th> --}}

                              <th>?????????? ??????????</th>
                              <th>??????????????????</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: center" >

                            @foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
                            <tr>
                              <td>{{ $tdlAssignedToThisUser->id }}</td>

                              <td style="text-align:center;color: #007bff" >
                                <a data-toggle="modal" data-target="#showTdl{{ $tdlAssignedToThisUser->id }}" >
                                    {{ $tdlAssignedToThisUser->name }}
                                </a>
                              </td>

                              <td>{{ $tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family }}</td>

                                <td>
                                    <span class="badge badge-{{$tdlAssignedToThisUser->priority_button}}">
                                        {{ $tdlAssignedToThisUser->priority ?? ''}}
                                    </span>
                                </td>

                                @foreach ($tdlAssignedToThisUser->users as $user)
                                    @if($user->id == auth()->user()->id)
                                        <td>
                                            <span class="badge badge-{{$user->status_assigner_pivot ?? ''}}">
                                                {{ $user->pivot->statusAssigner ?? ''}}
                                            </span>
                                            <br/>
                                            <a class="text-info" data-toggle="modal" data-target="#showDetailStatusAssigner{{ $tdlAssignedToThisUser->id }}" >
                                               ( ????????????)
                                             </a>
                                        </td>
                                        <td>
                                            <span class="badge {{ $user->pivot->status == '?????????? ??????' ? 'badge-success' : 'badge-warning' }}">
                                                {{ $user->pivot->status }}
                                            </span>
                                        </td>
                                    @endif
                                @endforeach
                              {{-- <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#ReferralsTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>  </td> --}}

                              <td style="direction: ltr" >{{ jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d') }}</td>
                              <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#editTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-edit"></i></a>  </td>

                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </section>
            <!--  End My Tasks Table -->

        <!-- Start Chart -->
        <section>
            <div  class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">?????????? ???????????? ?????? ?????????? ?????? ???? ??????</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="direction: ltr!important;" id="OTY"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">?????????? ???????????? ?????? ?????????? ?????? ???????? ??????</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="direction: ltr!important;" id="YTO"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--  End Chart -->
    </div>
  </div>
</div>


@section('footerscripts')
<script src="vendors/timetables/js/jquery.min.js"></script>
<script src="vendors/timetables/js/jquery.magnific-popup.js"></script>
<script src="vendors/timetables/js/timetable.js"></script>

<script src="/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>


<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>

<script src="/vendors/timetables/js/moment.min.js"></script>
<script src="/vendors/timetables/js/bootstrap-datetimepicker.min.js"></script>








<script type="text/javascript">
jQuery(document).ready(function() {

  // hide last wizard submit button
  $("[href=#finish]").hide();


  jQuery('.btn-delete-admin').click(function(e){
    alert("This admin user can't be deleted !");
    e.preventDefault();
  });

  jQuery('.btn-delete').click(function(e){
    var question = 'Are you sure you want to delete this ?';
    if (!confirm(question)) {
      e.preventDefault();
    }
  });

  // Date picker
  jQuery('.date-picker').datetimepicker({
    format: 'DD-MM-YYYY'
  });

  // Time picker
  jQuery('.time-picker').datetimepicker({
    format: 'HH:mm'
  });
});

</script>

<script>


var chart = AmCharts.makeChart( "YTO", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [

    {
      "country": '??????????',
      "litres": {{ $chart['ytoMotevaghef'] }}
    },{
      "country": '?????????? ??????',
      "litres": {{ $chart['ytoAnjamshode'] }}
    },{
      "country": '?????????? ??????????',
      "litres": {{ $chart['ytoDarhaaleanjam'] }}
    },{
      "country": '?????????? ????????',
      "litres": {{ $chart['ytoBarresinashode'] }}
    },

  ],
  "valueField": "litres",
  "titleField": "country",
  "balloon":{
    "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );


var chart = AmCharts.makeChart( "OTY", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [

    {
      "country": '??????????',
      "litres": {{ $chart['otuMotevaghef'] }}
    },{
      "country": '?????????? ??????',
      "litres": {{ $chart['otuAnjamshode'] }}
    },{
      "country": '?????????? ??????????',
      "litres": {{ $chart['otuDarhaaleanjam'] }}
    },{
      "country": '?????????? ????????',
      "litres": {{ $chart['otuBarresinashode'] }}
    },

  ],
  "valueField": "litres",
  "titleField": "country",
  "balloon":{
    "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );


</script>


@endsection
