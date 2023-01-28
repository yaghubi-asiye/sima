@extends('layouts/dashboard')

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
                                <h4 class="card-title">افزودن پیش فاکتور صادر شده </h4>
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
                                <div class="card-body card-dashboard"><br><br>


                                    <div class="text-left" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت تایم شیت پروژه آزادگان جنوبی </h4>

                                                </div>
                                                <div class="modal-body">
                                                    @include('components.error')

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{route('sheet.store')}}" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <div style="font-family:byekan" class="form-body productDivBody">

                                                            <div class="form-group row ">
                                                                <button type="button" class="btn btn-success col-md-12 " id="addProductBtn">
                                                                    <i class="ft-plus"></i> افزودن روز
                                                                </button>
                                                            </div>



                                                        </div>

                                                        <div style="font-family:Byekan" class="form-actions">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check-square-o"></i> ثبت
                                                            </button>
                                                        </div>
                                                    </form>


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

    <script type="text/javascript">
        function removeRow(rnum) {
            jQuery('#productDiv'+rnum).remove();

        }


        $(document).ready(function () {
            let counter = 1;

            $('#addProductBtn').on('click', function() {
                let newRow = $('<div class="form-group row" id="productDiv' + counter + '"></div>');
                let cols = "";
                cols += '<label class="col-md-3 label-control" >روز   </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][day]"></div>';
                cols += '<label class="col-md-3 label-control" >تاریخ  </label><div class="col-md-9"><input autocomplete="off" class="form-control" name="row[' + counter + '][date]" type="date" /></div>';
                cols += '<label class="col-md-3 label-control" >موضوع اقدام   </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][subject]"></div>';
                cols += '<label class="col-md-3 label-control" >شرح اقدام   </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][description]"></div>';
                cols += '<label class="col-md-3 label-control" >نتیجه اقدام   </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][result]"></div>';
                cols += '<label class="col-md-3 label-control" >ساعت شروع   </label><div class="col-md-9"> <input type="time" id="timesheetinput5" class="form-control" name="row[' + counter + '][start_time]"></div>';
                cols += '<label class="col-md-3 label-control" >ساعت خاتمه    </label><div class="col-md-9"> <input type="time" id="timesheetinput5" class="form-control" name="row[' + counter + '][end_time]"></div>';



                cols += '<div class="col-md-12"><button type="button" value="Remove" onclick="removeRow(' +counter+ ');" id="deleteProduct' + counter + '" class="btn btn-danger mr-1"><i class="ft-x"></i> حذف </button></div>';

                newRow.append(cols);
                $("div.productDivBody").append(newRow);
                counter++;


            });

        })

    </script>
@endsection














