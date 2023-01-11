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

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

    </style>
@endsection

@section('content')



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">مصوبات </h4>
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
                                <a href="{{ route('Approval.create')}}" style="float: left;margin-left: 40px!important;" class="btn btn-success btn-min-width mr-1 mb-1 ladda-button">
                                    <span class="ladda-label">
                                        <i class="ft-plus"></i>
                                         افزودن
                                    </span>
                                </a>


                                <div class="card-body card-dashboard"><br><br>

                                    <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">گزارش مصوبات</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-block">

                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">مدیریت</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">فنی</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">مالی</a>
                                                        </li>
                                                        <li class="nav-item" >
                                                            <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">بازرگانی</a>
                                                        </li>
                                                        <li class="nav-item" >
                                                            <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">اداری</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content px-1 pt-1">
                                                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                                            <table style="font-family:Byekan;width: 100%"
                                                                   class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                                                <thead>
                                                                <tr style="text-align: center">
                                                                    <th>ردیف</th>
                                                                    <th>عنوان جلسه</th>
                                                                    <th>تاریخ جلسه</th>
                                                                    <th>شماره جلسه</th>
                                                                    <th>نوع جلسه</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($data['manager'] as $Proceeding)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>
                                                                            <div id="heading1"  class="card-header">
                                                                                <a data-toggle="collapse" data-parent="#accordionWrapa{{ $loop->iteration }}" href="#accordion{{ $loop->iteration }}" aria-expanded="true" aria-controls="accordion1" class="card-title lead">{{ $Proceeding->title ?? ''}}</a>
                                                                            </div>
                                                                            <div id="accordion{{ $loop->iteration }}" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                                                                <div class="card-body">
                                                                                    <div class="card-block">
                                                                                        جزییات :
                                                                                        @foreach($Proceeding->approvalDetails as $item)
                                                                                            <ul>
                                                                                                <li>
                                                                                                    <span class="text-success">ردیف مصوبه</span>
                                                                                                    <span>{{$item->radifeMosavvabe}}</span>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span class="text-success">اقدام کننده</span>
                                                                                                    <span> {{$item->eghdamKonande}}</span>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span class="text-success">شرح مصوبه</span>
                                                                                                    <span >{{$item->sharheMosavvabe}}</span>
                                                                                                </li>

                                                                                            </ul>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-1 text-xs-center">

                                                                                <div class="text-xs-center">
                                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" data-original-title="@foreach($Proceeding->approvalDetails as $item) {{$item->sharheMosavvabe}} @endforeach">
                                                                                        {{ $Proceeding->date ?? ''}}
                                                                                    </button>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td>{{ $Proceeding->number ?? ''}}</td>
                                                                        <td>{{ $Proceeding->MeetingType ?? ''}}</td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                            <table style="font-family:Byekan;width: 100%"
                                                                   class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                                                <thead>
                                                                <tr style="text-align: center">
                                                                    <th>ردیف</th>
                                                                    <th>تاریخ جلسه</th>
                                                                    <th>شماره جلسه</th>
                                                                    <th>نوع جلسه</th>
                                                                    <th>عنوان جلسه</th>
                                                                    <th>ردیف مصوبه</th>
                                                                    <th>بخش  مربوطه</th>
                                                                    <th> اقدام کنندگان</th>
                                                                    <th>مهلت اقدام</th>
                                                                    <th>ارجاع</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($data['fani'] as $Proceeding)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $Proceeding->approval->date }}</td>
                                                                        <td>{{ $Proceeding->approval->number }}</td>
                                                                        <td>{{ $Proceeding->approval->MeetingType }}</td>
                                                                        <td>
                                                                            <a class="text-info" style="display:inline" data-toggle="modal" data-target="#detailApproval{{ $Proceeding->id }}" >
                                                                                {{ $Proceeding->approval->title }}
                                                                            </a>
                                                                        </td>

                                                                        <td>{{ $Proceeding->radifeMosavvabe }}</td>
                                                                        <td>{{ $Proceeding->eghdamKonande }}</td>
                                                                        <td>
                                                                            @foreach ($Proceeding->users as $user)
                                                                                @if($user->pivot->receiver_status == 'انجام شده')
                                                                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $Proceeding->id }}User{{$user->id}}" >
                                                                                        {{ $user->name  . " " . $user->family }} -
                                                                                    </a>
                                                                                @else
                                                                                    {{ $user->name  . " " . $user->family }} -
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $Proceeding->mohlateEghdam }}</td>
                                                                        <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#ReferralsTdl{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-external-link"></i>
                                                                            </a>
                                                                        </td>

                                                                        {{-- <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#checkResult{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-edit"></i>
                                                                            </a>
                                                                        </td> --}}

                                                                    </tr>
                                                                @endforeach


                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                                            <table style="font-family:Byekan;width: 100%"
                                                                   class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                                                <thead>
                                                                <tr style="text-align: center">
                                                                    <th>ردیف</th>
                                                                    <th>تاریخ جلسه</th>
                                                                    <th>شماره جلسه</th>
                                                                    <th>نوع جلسه</th>
                                                                    <th>عنوان جلسه</th>
                                                                    <th>ردیف مصوبه</th>
                                                                    <th>بخش  مربوطه</th>
                                                                    <th> اقدام کنندگان</th>
                                                                    <th>مهلت اقدام</th>
                                                                    <th>ارجاع</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($data['mali'] as $Proceeding)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $Proceeding->approval->date }}</td>
                                                                        <td>{{ $Proceeding->approval->number }}</td>
                                                                        <td>{{ $Proceeding->approval->MeetingType }}</td>
                                                                        <td>
                                                                            <a class="text-info" style="display:inline" data-toggle="modal" data-target="#detailApproval{{ $Proceeding->id }}" >
                                                                                {{ $Proceeding->approval->title }}
                                                                            </a>
                                                                        </td>

                                                                        <td>{{ $Proceeding->radifeMosavvabe }}</td>
                                                                        <td>{{ $Proceeding->eghdamKonande }}</td>
                                                                        <td>
                                                                            @foreach ($Proceeding->users as $user)
                                                                                @if($user->pivot->receiver_status == 'انجام شده')
                                                                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $Proceeding->id }}User{{$user->id}}" >
                                                                                        {{ $user->name  . " " . $user->family }} -
                                                                                    </a>
                                                                                @else
                                                                                    {{ $user->name  . " " . $user->family }} -
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $Proceeding->mohlateEghdam }}</td>
                                                                        <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#ReferralsTdl{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-external-link"></i>
                                                                            </a>
                                                                        </td>

                                                                        {{-- <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#checkResult{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-edit"></i>
                                                                            </a>
                                                                        </td> --}}

                                                                    </tr>
                                                                @endforeach


                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                                                            <table style="font-family:Byekan;width: 100%"
                                                                   class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                                                <thead>
                                                                <tr style="text-align: center">
                                                                    <th>ردیف</th>
                                                                    <th>تاریخ جلسه</th>
                                                                    <th>شماره جلسه</th>
                                                                    <th>نوع جلسه</th>
                                                                    <th>عنوان جلسه</th>
                                                                    <th>ردیف مصوبه</th>
                                                                    <th>بخش  مربوطه</th>
                                                                    <th> اقدام کنندگان</th>
                                                                    <th>مهلت اقدام</th>
                                                                    <th>ارجاع</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($data['bazargani'] as $Proceeding)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $Proceeding->approval->date }}</td>
                                                                        <td>{{ $Proceeding->approval->number }}</td>
                                                                        <td>{{ $Proceeding->approval->MeetingType }}</td>
                                                                        <td>
                                                                            <a class="text-info" style="display:inline" data-toggle="modal" data-target="#detailApproval{{ $Proceeding->id }}" >
                                                                                {{ $Proceeding->approval->title }}
                                                                            </a>
                                                                        </td>

                                                                        <td>{{ $Proceeding->radifeMosavvabe }}</td>
                                                                        <td>{{ $Proceeding->eghdamKonande }}</td>
                                                                        <td>
                                                                            @foreach ($Proceeding->users as $user)
                                                                                @if($user->pivot->receiver_status == 'انجام شده')
                                                                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $Proceeding->id }}User{{$user->id}}" >
                                                                                        {{ $user->name  . " " . $user->family }} -
                                                                                    </a>
                                                                                @else
                                                                                    {{ $user->name  . " " . $user->family }} -
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $Proceeding->mohlateEghdam }}</td>
                                                                        <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#ReferralsTdl{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-external-link"></i>
                                                                            </a>
                                                                        </td>

                                                                        {{-- <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#checkResult{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-edit"></i>
                                                                            </a>
                                                                        </td> --}}

                                                                    </tr>
                                                                @endforeach


                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                                                            <table style="font-family:Byekan;width: 100%"
                                                                   class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                                                <thead>
                                                                <tr style="text-align: center">
                                                                    <th>ردیف</th>
                                                                    <th>تاریخ جلسه</th>
                                                                    <th>شماره جلسه</th>
                                                                    <th>نوع جلسه</th>
                                                                    <th>عنوان جلسه</th>
                                                                    <th>ردیف مصوبه</th>
                                                                    <th>بخش  مربوطه</th>
                                                                    <th> اقدام کنندگان</th>
                                                                    <th>مهلت اقدام</th>
                                                                    <th>ارجاع</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($data['edari'] as $Proceeding)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $Proceeding->approval->date }}</td>
                                                                        <td>{{ $Proceeding->approval->number }}</td>
                                                                        <td>{{ $Proceeding->approval->MeetingType }}</td>
                                                                        <td>
                                                                            <a class="text-info" style="display:inline" data-toggle="modal" data-target="#detailApproval{{ $Proceeding->id }}" >
                                                                                {{ $Proceeding->approval->title }}
                                                                            </a>
                                                                        </td>

                                                                        <td>{{ $Proceeding->radifeMosavvabe }}</td>
                                                                        <td>{{ $Proceeding->eghdamKonande }}</td>
                                                                        <td>
                                                                            @foreach ($Proceeding->users as $user)
                                                                                @if($user->pivot->receiver_status == 'انجام شده')
                                                                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $Proceeding->id }}User{{$user->id}}" >
                                                                                        {{ $user->name  . " " . $user->family }} -
                                                                                    </a>
                                                                                @else
                                                                                    {{ $user->name  . " " . $user->family }} -
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $Proceeding->mohlateEghdam }}</td>
                                                                        <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#ReferralsTdl{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-external-link"></i>
                                                                            </a>
                                                                        </td>

                                                                        {{-- <td style="text-align:center;color: #007bff" >
                                                                            <a data-toggle="modal" data-target="#checkResult{{ $Proceeding->id }}" >
                                                                                <i style="font-size: 20px" class="ft-edit"></i>
                                                                            </a>
                                                                        </td> --}}

                                                                    </tr>
                                                                @endforeach


                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


@section('footerscripts')
    <script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
    <script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
