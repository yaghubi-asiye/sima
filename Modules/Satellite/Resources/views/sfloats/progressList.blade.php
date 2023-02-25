@extends('layouts/dashboard')
@section('content')
   

     <!--  Start Edit items -->
     @foreach($data as $item)
     <div class="modal fade text-left" id="EditSloat{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask{{ $item->id }}" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div   class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel17">بروزرسانی  شناورها </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div style="font-family:Byekan; direction: rtl" class="modal-body">

                     <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="{{route('sfloat.statusUpdate', $item->id)}}" class="form form-horizontal form-bordered striped-rows">
                         @csrf
                         @method('put')
                         <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">نام   </label>
                                <div class="col-md-9">
                                    <input type="text" id="name" disabled value="{{ $item->name }}" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">ماهواره </label>
                                <div class="col-md-9">
                                    <select id="saderKonandeh" class="form-control"  name="satellite_id" disabled>
                                        <option>انتخاب کنید</option>
                                        @foreach ($satellites as $itemvalue)
                                            <option {{ $itemvalue->id == $item->satellite_id ? 'selected' : '' }} value="{{ $itemvalue->id }}">{{ $itemvalue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input value="{{$item->id}}" name="parent_id" type="hidden" />
                            <input value="{{$item->name}}" name="name" type="hidden" />
                            <input value="{{$item->satellite_id}}" name="satellite_id" type="hidden" />
                            <input value="{{$filter}}" name="status" type="hidden" />

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ آغاز</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" disabled class="form-control" value="{{ jdate($item->date_start)->format('Y/m/d')}}"  placeholder="کلیک کنید" name="date_start" type="text" id="input1"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ اتمام</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" disabled class="form-control" value="{{ jdate($item->date_end)->format('Y/m/d')}}"   placeholder="کلیک کنید" name="date_end" type="text" id="input1"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">کل پهنای باند </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="{{ $item->hole_band }}"  name="hole_band">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">upload </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="{{ $item->upload }}" name="upload">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">download </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="{{ $item->download }}"  name="download">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh"> نام سرویس دهنده</label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="{{ $item->name_service }}" name="name_service">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">وضعیت </label>
                                <div class="col-md-9">
                                    <select class="form-control"  name="active">
                                        <option>انتخاب کنید</option>
                                        <option value="1">تایید</option>
                                        <option value="0">عدم تایید</option>
                                    </select>
                                </div>
                            </div>

                         </div>


                         <div class="form-actions">
                             <button type="submit" class="btn btn-success">
                                 <i class="fa fa-check-square-o"></i> بروز رسانی
                             </button>


                             <button type="button" class="btn btn-warning mr-1">
                                 <i class="ft-x"></i> لغو
                             </button>
                         </div>
                     </form>


                 </div>
             </div>
         </div>
     </div>
 @endforeach
 <!--  End Edit item -->


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="">لیست   شناورها</h1>
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
                                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></button>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center" >
                                            <th>نام</th>
                                            <th>تاریخ آغاز </th>
                                            <th>تاریخ اتمام</th>
                                            <th>کل پهنای باند</th>
                                            <th>upload</th>
                                            <th>download</th>
                                            <th>نام سرویس دهنده</th>
                                            <th>آخرین درخواست تغییر</th>
                                            <th>ویرایش</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $item)
                                            <tr>
                                              
                                                <td style="white-space: normal">
                                                    {{ $item->name }}
                                                </td>
                                                <td>{{ jdate($item->date_start)->format('Y/m/d')}}</td>
                                                <td>{{ jdate($item->date_end)->format('Y/m/d')}}</td>
                                                <td style="white-space: normal">{{ $item->hole_band }}</td>
                                                <td style="white-space: normal">{{ $item->upload }}</td>
                                                <td style="white-space: normal">{{ $item->download }}</td>
                                                <td style="white-space: normal">{{ $item->name_service }}</td>
                                                <td>{{ jdate($item->updated_at)->format('Y/m/d')}}</td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" >
                                                   
                                                    <a data-toggle="modal" data-target="#EditSloat{{$item->id}}">
                                                        <i style="font-size: 20px" class="ft-edit"></i>
                                                    </a>
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

            </div>
        </div>
    </div>

@endsection



@section('footerscripts')
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection

