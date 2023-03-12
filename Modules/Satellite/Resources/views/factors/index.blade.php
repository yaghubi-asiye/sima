@extends('layouts/dashboard')
@section('content')
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> صورتحساب ها</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.error')

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{route('sfloatfactor.store')}}" class="form form-horizontal form-bordered striped-rows">
                        @csrf
                        <div style="font-family:byekan" class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="sfloat_id">شناور </label>
                                <div class="col-md-9">
                                    <select id="sfloat_id" class="form-control"  name="sfloat_id">
                                        <option>انتخاب کنید</option>
                                        @foreach ($floats as $itemvalue)
                                            <option value="{{ $itemvalue->id }}">{{ $itemvalue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number"> شماره صورتحساب  </label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="number">
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date">تاریخ</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control"  placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="unit_price">مبلغ واحد   </label>
                                <div class="col-md-9">
                                    <input type="text" id="unit_price" class="form-control" name="unit_price">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="all_price">مبلغ کل   </label>
                                <div class="col-md-9">
                                    <input type="text" id="all_price" class="form-control" name="all_price">
                                </div>
                            </div>
                           

                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
                            </button>

                            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                <i class="ft-x"></i> لغو
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="">لیست صورتحساب ها  </h1>
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
                                            <th>ردیف</th>
                                            <th>شناور</th>
                                            <th>شماره صورتحساب</th>
                                            <th>تاریخ</th>
                                            <th>مبلغ واحد</th>
                                            <th>مبلغ کل</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="white-space: normal">{{ $item->sfloat_id }}</td>
                                                <td style="white-space: normal">{{ $item->number }}</td>
                                                <td style="white-space: normal">{{ $item->date }}</td>
                                                <td style="white-space: normal">{{ $item->unit_price }}</td>
                                                <td style="white-space: normal">{{ $item->all_price }}</td>
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

