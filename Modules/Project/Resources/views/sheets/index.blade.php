@extends('layouts/dashboard')
@include('components.style')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               @include('components.error')

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">لیست   تایم شیت من در پروژه آزادگان جنوبی </h4>
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
                                <a  style="float: left;margin-left: 40px!important;" target="_blank"  class="btn btn-success btn-min-width mr-1 mb-1"  href="{{ route('sheet.create') }}"><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></a>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center" >
                                            <th>ردیف</th>
                                            <th>  روز </th>
                                            <th>تاریخ </th>
                                            <th>  ساعت شروع</th>
                                            <th>ساعت خاتمه </th>
                                            <th>مدت زمان صرف شده </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="white-space: normal">{{ $item->day }}</td>
                                                <td>{{ jdate($item->date) }}</td>
                                                <td style="white-space: normal">{{ $item->start_time }}</td>
                                                <td style="white-space: normal">{{ $item->end_time }}</td>
                                                <td style="white-space: normal">{{ $item->end_time }}</td>
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



@endsection


@include('components.script')
