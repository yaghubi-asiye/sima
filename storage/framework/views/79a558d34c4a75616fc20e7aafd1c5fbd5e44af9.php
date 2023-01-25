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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--  Start Add Task PopUp -->
<div class="modal fade text-left" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="Tdl/addTdl" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name"   class="form-control" name="name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">انتخاب متولی</option>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . " " . $user->family); ?> | <?php echo e($user->position); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" value="عادی">عادی</option>
                  <option class="form-control" value="متوسط">متوسط</option>
                  <option class="form-control" value="آنی">آنی</option>
                  <option class="form-control" value="فوری">فوری</option>
                </select>
              </div>

            </div>


            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>



          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن فعالیت
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
<!--  End Add Task PopUp -->





<!--  Start Edit Task Assigned to Me -->
<?php $__currentLoopData = $tdlsAssignedToThisUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="font-family:Byekan" class="modal fade text-left" id="editTdl<?php echo e($tdlAssignedToThisUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="Tdl/updateFromDoer"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                <input type="text" id="id" value="<?php echo e($tdlAssignedToThisUser->id); ?>" class="form-control" name="id" >
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت</label>
              <div class="col-md-9">
                <input type="text" id="name" value="<?php echo e($tdlAssignedToThisUser->name); ?>" class="form-control" name="name" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح</label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30" disabled ><?php echo e($tdlAssignedToThisUser->description); ?></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">ارجاع دهنده</label>
              <div class="col-md-9">
                <input type="text" id="assignerName" value="<?php echo e($tdlAssignedToThisUser->assignerName); ?>" class="form-control" name="assignerName" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت</label>
              <div class="col-md-9">
                <input type="text" id="priority" value="<?php echo e($tdlAssignedToThisUser->priority); ?>" class="form-control" name="priority" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="status">آخرین وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="status">
                  <option class="form-control" <?php echo e($tdlAssignedToThisUser->status == 'درحال انجام' ? 'selected' : ""); ?> value="درحال انجام"> درحال انجام </option>
                  <option class="form-control" <?php echo e($tdlAssignedToThisUser->status == 'انجام شده' ? 'selected' : ""); ?> value="انجام شده">انجام شده</option>
                  <option class="form-control" <?php echo e($tdlAssignedToThisUser->status == 'متوقف' ? 'selected' : ""); ?> value="متوقف">متوقف</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="holdPoint">دلیل عدم تحقق <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="holdPoint" value="<?php echo e($tdlAssignedToThisUser->holdPoint); ?>" class="form-control" name="holdPoint">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="doerDescription">نتیجه<sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <textarea class="form-control" name="doerDescription" rows="3" cols="30"><?php echo e($tdlAssignedToThisUser->doerDescription); ?></textarea>
              </div>
            </div>


            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="doerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="doerAttachment" class="form-control" name="doerAttachment">
              </div>
            </div>







            <p style="padding: 30px; color: red;" > * درصورت اتمام کار فرم زیر را تکمیل فرمایید * </p>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">ساعت شروع <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="startHour"  placeholder="مثال: 12:10" class="form-control" name="startHour">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">ساعت پایان <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <input type="text" id="endHour"  placeholder="مثال: 10:25" class="form-control" name="endHour">

              </div>
            </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> بروزرسانی
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit Task Assigned to Me -->

<!--  Start Edit Task Assigned to Me -->
<?php $__currentLoopData = $tdlsAssignedToThisUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="font-family:Byekan" class="modal fade text-left" id="showTdl<?php echo e($tdlAssignedToThisUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>">جزییات فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center"  class="form form-horizontal form-bordered striped-rows">

          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->id); ?>

              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت</label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->name); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح</label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->description); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">ارجاع دهنده</label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->assignerName); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت</label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->priority); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="status">آخرین وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
              <?php echo e($tdlAssignedToThisUser->status ?? ''); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="holdPoint">دلیل عدم تحقق <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->holdPoint ?? ''); ?>

              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="doerDescription">نتیجه<sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->doerDescription ?? ''); ?>

              </div>
            </div>


            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="doerAttachment"> مستندات متولی انجام</label>
              <div class="col-md-9">
                    <a target="_blank" href="<?php echo e($tdlAssignedToThisUser->doerAttachment); ?>"> <?php echo $tdlAssignedToThisUser->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?>

                    </a>
              </div>
            </div>

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="doerAttachment">مستندات ارجاع دهنده </label>
                <div class="col-md-9">
                      <a target="_blank" href="<?php echo e($tdlAssignedToThisUser->assignerAttachment); ?>">
                          <?php echo $tdlAssignedToThisUser->assignerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?>

                      </a>
                </div>
              </div>




            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">ساعت شروع </label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->startHour ?? ''); ?>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">ساعت پایان </label>
              <div class="col-md-9">
                <?php echo e($tdlAssignedToThisUser->endHour ?? ''); ?>

              </div>
            </div>

          </div>


        </form>


      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit Task Assigned to Me -->


<!--  Start Edit Task Assigned to Other -->
<?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade text-left" id="EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Tdl/updateAssignedToOther" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name" value=" <?php echo e($tdlAssignedToOther->name); ?> "  class="form-control" name="name">
              </div>
            </div>

            <input style="display: none" value="<?php echo e($tdlAssignedToOther->id); ?>" name="id" hidden type="text">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30"><?php echo e($tdlAssignedToOther->description); ?></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
                  <option class="" value="">انتخاب متولی</option>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($tdlAssignedToOther->user_id == $user->id ? "selected"  : ""); ?> ><?php echo e($user->name . " " . $user->family); ?> | <?php echo e($user->position); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="priority" >
                  <option class="form-control" <?php echo e($tdlAssignedToOther->priority == "عادی" ? "selected"  : ""); ?>  value="عادی">عادی</option>
                  <option class="form-control" <?php echo e($tdlAssignedToOther->priority == "متوسط" ? "selected"  : ""); ?> value="متوسط">متوسط</option>
                  <option class="form-control" <?php echo e($tdlAssignedToOther->priority == "آنی" ? "selected"  : ""); ?> value="آنی">آنی</option>
                  <option class="form-control" <?php echo e($tdlAssignedToOther->priority == "فوری" ? "selected"  : ""); ?> value="فوری">فوری</option>
                </select>
              </div>

            </div>

            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="assignerAttachment">فایل ضمیمه</label>
              <div class="col-md-9">
                <input type="file" id="assignerAttachment" class="form-control" name="assignerAttachment">
              </div>
            </div>



          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن فعالیت
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit Task Assigned to Other -->



<!--  Start Edit EditOtherTaskForAssigner -->
<?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade text-left" id="EditOtherTaskForAssigner<?php echo e($tdlAssignedToOther->id); ?>" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">تایید فعالیت ارجاع شده با نام <?php echo e($tdlAssignedToOther->name ?? ''); ?> به <?php echo e($tdlAssignedToOther->user->name . ' '. $tdlAssignedToOther->user->family); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Tdl/updateAssignerStatus" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            

            <input style="display: none" value="<?php echo e($tdlAssignedToOther->id); ?>" name="id" hidden type="text">

            <div class="form-group row">
                <label class="col-md-3 label-control" for="statusAssigner">وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
                <div class="col-md-9">
                  <select class="form-control" name="statusAssigner" >
                    <option class="form-control" <?php echo e($tdlAssignedToOther->statusAssigner == "تایید شده" ? "selected"  : ""); ?>  value="تایید شده">تایید شده</option>
                    <option class="form-control" <?php echo e($tdlAssignedToOther->statusAssigner == "رد شده" ? "selected"  : ""); ?> value="رد شده">رد شده</option>
                    <option class="form-control" <?php echo e($tdlAssignedToOther->statusAssigner == "متوقف" ? "selected"  : ""); ?> value="متوقف">متوقف</option>
                  </select>
                </div>

              </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="descriptionAssigner">توضیحات ضمیمه </label>
              <div class="col-md-9">
                <textarea class="form-control" name="descriptionAssigner" rows="3" cols="30"><?php echo e($tdlAssignedToOther->descriptionAssigner); ?></textarea>
              </div>
            </div>








          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i>بروزرسانی
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit EditOtherTaskForAssigner -->



<!--  Start ReferralsTdl -->
<?php $__currentLoopData = $tdlsAssignedToThisUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl<?php echo e($tdlAssignedToThisUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl<?php echo e($tdlAssignedToThisUser->id); ?>">ارجاع فعالیت به دیگران</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center" method="post" action="Tdl/updateDoer"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">

            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                <input type="text" id="id" value="<?php echo e($tdlAssignedToThisUser->id); ?>" class="form-control" name="id" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo" class="selectize-event required">
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
              <i class="fa fa-check-square-o"></i> بروزرسانی
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End ReferralsTdl -->


<!--  Start DetailOtherTaskAssigned to Other -->
<?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade text-left" id="DetailOtherTask<?php echo e($tdlAssignedToOther->id); ?>" tabindex="-1" role="dialog" aria-labelledby="DetailOtherTask<?php echo e($tdlAssignedToOther->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">جزییات  فعالیت های ارجاع داده شده از طرف شما به دیگران </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">ردیف  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->id ?? ''); ?>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">  نام فعالیت  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->name ?? ''); ?>


                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">شرح  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->description ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">ارجاع دهنده  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->assignerName); ?>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour"> متولی انجام  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family); ?>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour"> اهمیت  </label>
                <div class="col-md-9">
                    <span class="badge badge-danger"><?php echo e($tdlAssignedToOther->priority); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">آخرین وضعیت   </label>
                <div class="col-md-9">
                    <span class="badge <?php echo e($tdlAssignedToOther->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>"><?php echo e($tdlAssignedToOther->status); ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">دلیل عدم تحقق   </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->holdPoint ?? ''); ?>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">نتیجه   </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->doerDescription ?? ''); ?>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">مستندات ارجاع دهنده   </label>
                <div class="col-md-9">
                    <a target="_blank" href="<?php echo e($tdlAssignedToOther->assignerAttachment); ?>"> <?php echo $tdlAssignedToOther->assignerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
                <div class="col-md-9">
                    <a target="_blank" href="<?php echo e($tdlAssignedToOther->doerAttachment); ?>"> <?php echo $tdlAssignedToOther->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">تاریخ ایجاد  </label>
                <div class="col-md-9">
                    <?php echo e(jdate($tdlAssignedToOther->created_at) ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control"  for="endHour">آخرین بروزرسانی   </label>
                <div class="col-md-9">
                    <?php echo e(jdate($tdlAssignedToOther->updated_at) ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">توضیحات ارجاع دهنده   </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->descriptionAssigner ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control"  for="startHour">وضعیت بررسی ارجاع دهنده   </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->statusAssigner ?? ''); ?>

                </div>
            </div>



        </div>
        </form>


      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--  End Edit Task Assigned to Other -->


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
             <p> <?php echo e($interval->format(' %m ماه %d روز %H ساعت %i دقیقه %s ثانیه مانده به تحویل سال 1402')); ?></p>
            </ul>
        </div>


        <?php if(count($baners) > 0): ?>
        <?php $__currentLoopData = $baners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> <?php echo e($baner->title ?? ''); ?> </strong>
                <?php echo e($baner->description ?? ''); ?>

                <p style="text-align: left"><?php echo e($baner->addedByName ?? ''); ?></p>
                <p style="text-align: right"><?php echo e(jdate($baner->created_at)); ?></p>
               <?php if($baner->file != "storage/Baners/Nothing"): ?>
                    <p style="text-align:center;color: #3BAFDA">
                        دانلود فایل پیوست:
                        <a target="_blank" href="<?php echo e($baner->file); ?>">
                            <i style="font-size: 20px" class="ft-file-text"></i>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      


      <?php if($errors->any()): ?>
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>

      <?php if($box['7']): ?>
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
            <li><?php echo e(auth()->user()->name .' '. auth()->user()->family); ?> شما <?php echo e($box['7']); ?> فعالیت بررسی نشده در این ماه دارید لطفا فعالیت های خود را بررسی کنید</li>
        </ul>
      </div>
      <?php endif; ?>


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
                        <span class="font-large-1 text-bold-300 info float-right" style="color:#007bff !important"><?php echo e($box['1']); ?></span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">فعالیت های محول شده امروز شما</span>
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
                        <span class="font-large-1 text-bold-300 info float-right" style="color:#007bff !important"><?php echo e($box['2']); ?></span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">فعالیت های انجام شده امروز شما</span>
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
                        <span class="font-large-1 text-bold-300 warning float-right"> <?php echo e($box['5']); ?> </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">فعالیت های محول شده این ماه شما</span>
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
                        <span class="font-large-1 text-bold-300 warning float-right"> <?php echo e($box['6']); ?> </span>
                      </div>
                      <div style="text-align: center;font-size: 18px;" class="clearfix">
                        <span class="text-white witheColor">فعالیت های انجام شده این ماه شما</span>
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
                <h4 class="card-title">فعالیت های ارجاع داده شده از طرف شما به دیگران</h4>
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
                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i>  افزودن فعالیت  </span></button><br><br>
                <div class="card-body card-dashboard">
                  <p class="card-text">در این قسمت میتوانید فعالیت هایی که به دیگران ارجاع داده اید را بررسی نمایید.</p>
                  <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>نام فعالیت</th>
                       
                        <th>ارجاع دهنده</th>
                        <th>متولی انجام</th>
                        <th>اهمیت</th>
                        <th>آخرین وضعیت</th>
                        <th> وضعیت بررسی ارجاع دهنده</th>
                       
                       
                       
                       
                       <th>تاریخ ایجاد</th>
                       
                        <?php if(auth()->user()->id == 6 || auth()->user()->id == 48 ): ?>
                        <th>عملیات</th>
                        <?php endif; ?>

                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      <?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($tdlAssignedToOther->id); ?></td>
                          
                          <td style="white-space: pre-wrap"><a style="color:#007bff !important" data-toggle="modal" data-target="#DetailOtherTask<?php echo e($tdlAssignedToOther->id); ?>"><?php echo e($tdlAssignedToOther->name); ?></a></td>

                       
                        <td><?php echo e($tdlAssignedToOther->assignerName); ?></td>
                        <td><?php echo e($tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family); ?></td>
                        <td><span class="badge badge-danger"><?php echo e($tdlAssignedToOther->priority); ?></span></td>
                        <td>
                            <span class="badge <?php echo e($tdlAssignedToOther->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>"><?php echo e($tdlAssignedToOther->status); ?></span>
                        </td>
                        <td >
                            <span class="badge <?php echo e($tdlAssignedToOther->statusAssigner == 'تایید شده' ? 'badge-success' : 'badge-warning'); ?>">
                                <?php echo e($tdlAssignedToOther->statusAssigner?? 'بررسی نشده'); ?>

                                <?php if($tdlAssignedToOther->status == 'انجام شده'): ?>
                                <a data-toggle="modal" data-target="#EditOtherTaskForAssigner<?php echo e($tdlAssignedToOther->id); ?>" ><i style="font-size: 20px; color: #007bff" class="ft-edit"></i></a>

                                
                                <?php endif; ?>
                            </span>

                        </td>
                       
                       
                       
                       
                       <td style="direction: ltr" ><?php echo e(jdate($tdlAssignedToOther->created_at)->format('Y/m/d')); ?></td>
                       
                        <?php if(auth()->user()->id == 6 || auth()->user()->id == 48 ): ?>
                        <td style="text-align:center;" > <a href="/Tdl/delete/<?php echo e($tdlAssignedToOther->id); ?>" ><i style="font-size: 20px;color: red" class="ft-x-square"></i></a>
                          <a data-toggle="modal" data-target="#EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" ><i style="font-size: 20px; color: #007bff" class="ft-edit"></i></a>
                        </td>
                        <?php endif; ?>

                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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
                      <h4 class="card-title">فعالیت های ارجاع داده شده به شما</h4>
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
                        <p class="card-text">لیست ذیل شامل تمامی فعالیت های ارجاع داده شده توسط دیگران به شما میباشد. شما میتوانید با کلیک برروی آیکون تغییرات فعالیت مورد نظر را بروزرسانی کنید.</p>
                        <table style="font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                          <thead>
                            <tr style="text-align: center;">
                              <th>ردیف</th>
                              <th>نام فعالیت</th>
                              <th>ارجاع دهنده</th>
                              <th>اهمیت</th>
                              <th>آخرین وضعیت</th>
                              <th>ارجاع </th>

                              <th>تاریخ ایجاد</th>
                              <th>بروزرسانی</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: center" >

                            <?php $__currentLoopData = $tdlsAssignedToThisUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($tdlAssignedToThisUser->id); ?></td>

                              <td style="text-align:center;color: #007bff" >
                                <a data-toggle="modal" data-target="#showTdl<?php echo e($tdlAssignedToThisUser->id); ?>" >
                                    <?php echo e($tdlAssignedToThisUser->name); ?>

                                </a>
                              </td>

                              <td><?php echo e($tdlAssignedToThisUser->assignerName); ?></td>
                              <td><span class="badge badge-danger"><?php echo e($tdlAssignedToThisUser->priority); ?></span></td>
                              <td><span class="badge <?php echo e($tdlAssignedToThisUser->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>"><?php echo e($tdlAssignedToThisUser->status); ?></span></td>
                              <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#ReferralsTdl<?php echo e($tdlAssignedToThisUser->id); ?>" ><i style="font-size: 20px" class="ft-external-link"></i></a>  </td>

                              <td style="direction: ltr" ><?php echo e(jdate($tdlAssignedToThisUser->created_at)); ?></td>
                              <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#editTdl<?php echo e($tdlAssignedToThisUser->id); ?>" ><i style="font-size: 20px" class="ft-edit"></i></a>  </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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
                            <h4 class="card-title">وضعیت فعالیت های ارجاع شده به شما</h4>
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
                            <h4 class="card-title">وضعیت فعالیت های ایجاد شده توسط شما</h4>
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


<?php $__env->startSection('footerscripts'); ?>
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
      "country": 'متوقف',
      "litres": <?php echo e($chart['ytoMotevaghef']); ?>

    },{
      "country": 'انجام شده',
      "litres": <?php echo e($chart['ytoAnjamshode']); ?>

    },{
      "country": 'درحال انجام',
      "litres": <?php echo e($chart['ytoDarhaaleanjam']); ?>

    },{
      "country": 'بررسی نشده',
      "litres": <?php echo e($chart['ytoBarresinashode']); ?>

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
      "country": 'متوقف',
      "litres": <?php echo e($chart['otuMotevaghef']); ?>

    },{
      "country": 'انجام شده',
      "litres": <?php echo e($chart['otuAnjamshode']); ?>

    },{
      "country": 'درحال انجام',
      "litres": <?php echo e($chart['otuDarhaaleanjam']); ?>

    },{
      "country": 'بررسی نشده',
      "litres": <?php echo e($chart['otuBarresinashode']); ?>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>