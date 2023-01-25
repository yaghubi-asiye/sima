<?php $__env->startSection('headerscripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">مصوبات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="/Approval" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>
                        <div style="font-family:byekan" class="form-body">



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="contractor">نوع جلسه</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="MeetingType">
                                        <option class="form-item" value="هیات مدیره">هیات مدیره</option>
                                        <option class="form-item" value="شورای مدیران">شورای مدیران</option>
                                        <option class="form-item" value="سایر">سایر</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row last">
                                <label class="col-md-3 label-control" for="import_file">فایل اکسل</label>
                                <div class="col-md-9">
                                    <input type="file" id="import_file" class="form-control"
                                           name="import_file">
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

     <!--  Start Edit $items -->
        <?php $__currentLoopData = $Proceedings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="font-family:Byekan" class="modal fade text-left" id="detailApproval<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div style="text-align: center!important;" class="modal-header">
                            <h4 style="text-align: center!important;" class="modal-title" id="detailApproval<?php echo e($item->id); ?>">جزییات</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div  style=" direction: rtl;" class="modal-body">


                            <form style="vertical-align:center;text-align:center"   class="form form-horizontal form-bordered striped-rows">

                                <div class="form-body">


                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="date">عنوان جلسه</label>
                                        <div class="col-md-9">
                                            <?php echo e($item->approval->title); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="date">تاریخ جلسه</label>
                                        <div class="col-md-9">
                                        <?php echo e($item->approval->date); ?>

                                        </div>
                                    </div>
                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id">شماره جلسه</label>
                                        <div class="col-md-9">
                                            <?php echo e($item->approval->number); ?>

                                        </div>
                                    </div>

                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id">حاضرین جلسه</label>
                                        <div class="col-md-9">
                                            <?php echo e($item->approval->hazerin); ?>

                                        </div>
                                    </div>

                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id">شرح مصوبه </label>
                                        <div class="col-md-9">
                                            <?php echo e($item->sharheMosavvabe); ?>

                                        </div>
                                    </div>


                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id">فایل صورتجلسه </label>
                                        <div class="col-md-9">
                                            <a target="_blank" href="<?php echo e($item->approval->fileSooratJalase); ?>">
                                                <i class="ft-file-text"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p style="padding: 30px; color: red;" > * نتیجه مصوبه* </p>

                                    <?php $__currentLoopData = $item->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> اقدام کننده گان </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->name .' '.  $approval->family); ?>

                                            </div>
                                        </div>

                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> وضعیت بررسی اقدام کننده </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->pivot->receiver_status); ?>

                                            </div>
                                        </div>

                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> نتیجه اقدام کنند ه </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->pivot->receiver_result); ?>

                                            </div>
                                        </div>

                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> فایل پیوست اقدام کننده </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->pivot->receiver_attachment); ?>

                                            </div>
                                        </div>

                                        
                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> وضعیت بررسی کنند ه </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->pivot->sender_status); ?>

                                            </div>
                                        </div>
                                        <div  class="form-group row">
                                            <label class="col-md-3 label-control" for="id"> نتیجه بررسی کنند ه </label>
                                            <div class="col-md-9">
                                                <?php echo e($approval->pivot->sender_result); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--  End Edit $items -->


    <!--  Start ReferralsTdl -->
<?php $__currentLoopData = $Proceedings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl<?php echo e($tdlAssignedToThisUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl<?php echo e($tdlAssignedToThisUser->id); ?>">  نتیجه مصوبه </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="<?php echo e(route('Approval.update',$tdlAssignedToThisUser->id )); ?>"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-body">


            <p style="padding: 30px; color: red;" > * درصورت اتمام کار فرم زیر را تکمیل فرمایید * </p>
            <div class="form-group row">
                <label class="col-md-3 label-control" for="receiver_status">وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
                <div class="col-md-9">
                  <select class="form-control" name="receiver_status" >
                    <option class="form-control" value=""> انتخاب کنید</option>
                    <option value="اطلاع">اطلاع</option>
                    <option class="form-control" value="درحال انجام">درحال انجام</option>
                    <option class="form-control" value="انجام شده">انجام شده</option>
                    <option class="form-control" value="عدم امکان"> عدم امکان</option>
                    
                  </select>
                </div>

              </div>

              <div  class="form-group row last">
                <label class="col-md-3 label-control" for="receiver_result">نتیجه <sup style="color: red; font-size: 18px" >*</sup> </label>
                <div class="col-md-9">
                  <textarea  id="receiver_result" class="form-control" name="receiver_result"></textarea>
                </div>
              </div>
              <div  class="form-group row last">
                <label class="col-md-3 label-control" for="receiver_attachment">فایل ضمیمه</label>
                <div class="col-md-9">
                  <input type="file" id="receiver_attachment" class="form-control" name="receiver_attachment">
                </div>
              </div>


            <p style="padding: 30px; color: red;" > * درصورت  نیاز به ارجاع به کارشناس فرم زیر را تکمیل فرمایید * </p>
            <div class="form-group row">
                <label class="col-md-3 label-control" for="receiver_id"> اقدام کننده <sup style="color: red; font-size: 18px" >*</sup> </label>
                <div class="col-md-9">
                  <select id="selectize-state" name="receiver_id[]" class="selectize-event required" multiple>
                    <option class="" value="">انتخاب متولی</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . " " . $user->family); ?> | <?php echo e($user->position); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                </div>
              </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ذخیره
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End ReferralsTdl -->

<!--  Start Edit EditOtherTaskForAssigner -->
<?php $__currentLoopData = $Proceedings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $tdlAssignedToOther->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade text-left" id="EditOtherTaskForAssigner<?php echo e($tdlAssignedToOther->id); ?>User<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div   class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">تایید فعالیت ارجاع شده با نام <?php echo e($tdlAssignedToOther->name ?? ''); ?> به <?php echo e($user->name . ' '. $user->family); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="font-family:Byekan; direction: rtl" class="modal-body">

                <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Approval/updateAssignerStatus/<?php echo e($tdlAssignedToOther->id); ?>" class="form form-horizontal form-bordered striped-rows">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-body">

                    <input style="display: none" value="<?php echo e($tdlAssignedToOther->id); ?>" name="id" hidden type="text">
                    <input style="display: none" value="<?php echo e($user->pivot->id); ?>" name="pivot_id" hidden type="text">

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="statusAssigner">وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
                        <div class="col-md-9">
                        <select class="form-control" name="statusAssigner" >
                            <option class="form-control" > انتخاب کنید</option>
                            <option class="form-control" <?php echo e($user->pivot->receiver_status == "تایید شده" ? "selected"  : ""); ?>  value="تایید شده">تایید شده</option>
                            <option class="form-control" <?php echo e($user->pivot->receiver_status == "رد شده" ? "selected"  : ""); ?> value="رد شده">رد شده</option>
                            <option class="form-control" <?php echo e($user->pivot->receiver_status == "متوقف" ? "selected"  : ""); ?> value="متوقف">متوقف</option>
                            <option class="form-control" <?php echo e($user->pivot->receiver_status == "برگشت خورده" ? "selected"  : ""); ?> value="برگشت خورده">برگشت خورده</option>
                        </select>
                        </div>

                    </div>

                    <div class="form-group row">
                    <label class="col-md-3 label-control" for="descriptionAssigner">توضیحات ضمیمه </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="descriptionAssigner" rows="3" cols="30"><?php echo e($user->pivot->receiver_result); ?></textarea>
                    </div>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                    <i class="fa fa-check-square-o"></i>بروزرسانی
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit EditOtherTaskForAssigner -->



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


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
                                <a href="<?php echo e(route('Approval.create')); ?>" style="float: left;margin-left: 40px!important;" class="btn btn-success btn-min-width mr-1 mb-1 ladda-button">
                                    <span class="ladda-label">
                                        <i class="ft-plus"></i>
                                         افزودن
                                    </span>
                                </a>
                                <div class="card-body card-dashboard"><br><br>
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

                                        <?php $__currentLoopData = $Proceedings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Proceeding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($Proceeding->approval->date); ?></td>
                                                <td><?php echo e($Proceeding->approval->number); ?></td>
                                                <td><?php echo e($Proceeding->approval->MeetingType); ?></td>
                                                <td>
                                                    <a class="text-info" style="display:inline" data-toggle="modal" data-target="#detailApproval<?php echo e($Proceeding->id); ?>" >
                                                        <?php echo e($Proceeding->approval->title); ?>

                                                    </a>
                                                </td>

                                                <td><?php echo e($Proceeding->radifeMosavvabe); ?></td>
                                                <td><?php echo e($Proceeding->eghdamKonande); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $Proceeding->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($user->pivot->receiver_status == 'انجام شده'): ?>
                                                            <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner<?php echo e($Proceeding->id); ?>User<?php echo e($user->id); ?>" >
                                                                <?php echo e($user->name  . " " . $user->family); ?> -
                                                            </a>
                                                        <?php else: ?>
                                                            <?php echo e($user->name  . " " . $user->family); ?> -
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td><?php echo e($Proceeding->mohlateEghdam); ?></td>
                                                <td style="text-align:center;color: #007bff" >
                                                    <a data-toggle="modal" data-target="#ReferralsTdl<?php echo e($Proceeding->id); ?>" >
                                                        <i style="font-size: 20px" class="ft-external-link"></i>
                                                    </a>
                                                </td>

                                                

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footerscripts'); ?>
<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>
<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>