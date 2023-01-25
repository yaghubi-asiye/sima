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

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">

            <input type="text" name="status" value="بررسی نشده" hidden>

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

                <select id="selectize-state" name="assignedTo[]" class="selectize-event required" multiple>
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
            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
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
        <form style="vertical-align:center;text-align:center" method="post" action="/Newtdl/updateFromDoer/<?php echo e($tdlAssignedToThisUser->id); ?>"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
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
                <input type="text" id="assignerName" value="<?php echo e($tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family); ?>" class="form-control" name="assignerName" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="priority">اهمیت</label>
              <div class="col-md-9">
                <input type="text" id="priority" value="<?php echo e($tdlAssignedToThisUser->priority); ?>" class="form-control" name="priority" disabled>
              </div>
            </div>


            <?php $__currentLoopData = $tdlAssignedToThisUser->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->id == auth()->user()->id): ?>
                    <input type="text" hidden value="<?php echo e($user->pivot->id); ?>" name="newtdl_id">

                    <p style="padding: 30px; color: red;" > * درصورت انجام شدن کار  الزامی است نتیجه آن را واردکنید و درصورت توقف در بخش نتیجه توضیحات توقف را ذکر نمایید .    * </p>
                    <div class="form-group row">
                    <label class="col-md-3 label-control" for="status">آخرین وضعیت <sup style="color: red; font-size: 18px" >*</sup> </label>
                    <div class="col-md-9">
                        <select class="form-control" name="status">
                        <option class="form-control" disabled <?php echo e($user->pivot->status == 'بررسی نشده' ? 'selected' : ""); ?> value="درحال انجام">  بررسی نشده </option>
                        <option class="form-control" <?php echo e($user->pivot->status == 'درحال انجام' ? 'selected' : ""); ?> value="درحال انجام"> درحال انجام </option>
                        <option class="form-control" <?php echo e($user->pivot->status == 'انجام شده' ? 'selected' : ""); ?> value="انجام شده">انجام شده</option>
                        <option class="form-control" <?php echo e($user->pivot->status == 'متوقف' ? 'selected' : ""); ?> value="متوقف">متوقف</option>
                        </select>
                    </div>
                    </div>



                    <div class="form-group row last">
                    <label class="col-md-3 label-control" for="result">نتیجه<sup style="color: red; font-size: 18px" >*</sup></label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="result" rows="3" cols="30"><?php echo e($user->pivot->result); ?></textarea>
                    </div>
                    </div>


                    <div  class="form-group row last">
                        <label class="col-md-3 label-control" for="attachment">فایل ضمیمه</label>
                        <div class="col-md-9">
                            <input type="file" id="attachment" class="form-control" name="attachment">
                        </div>
                    </div>

                    <div  class="form-group row last">
                        <label class="col-md-3 label-control" for="assignerAttachment">دانلود فایل ضمیمه</label>
                        <div class="col-md-9">
                            <a target="_blank" href="/<?php echo e($user->pivot->attachment); ?>">
                                 <?php echo isset($user->pivot->attachment) && $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "بدون فایل"; ?>

                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> بروزرسانی
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
                <?php echo e($tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family); ?>

              </div>
            </div>


              <?php $__currentLoopData = $tdlAssignedToThisUser->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="form-group row">
                  <label class="col-md-3 label-control">متولی های انجام</label>
                  <div class="col-md-9 text-left">
                      <?php echo e($user->name  . " " . $user->family); ?>

                      <span class="badge <?php echo e($user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>">
                          <?php echo e($user->pivot->status); ?>

                      </span>
                      فایل پیوست :
                      <a target="_blank" href="<?php echo e($user->pivot->attachment); ?>">
                          <?php echo $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?>

                      </a>
                      نتیجه :
                      <span><?php echo e($user->pivot->result ?? '---'); ?></span>
                  </div>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <div class="form-group row">
              <label class="col-md-3 label-control"> اهمیت  </label>
              <div class="col-md-9">
                  <span class="badge badge-<?php echo e($tdlAssignedToThisUser->priority_button); ?>">
                      <?php echo e($tdlAssignedToThisUser->priority ?? ''); ?>

                  </span>
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
              <div class="col-md-9">
                  <a target="_blank" href="<?php echo e($tdlAssignedToThisUser->doerAttachment); ?>"> <?php echo $tdlAssignedToThisUser->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
              </div>
          </div>



          <div class="form-group row">
              <label class="col-md-3 label-control">تاریخ ایجاد  </label>
              <div class="col-md-9">
                  <?php echo e(jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d') ?? ''); ?>

              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">توضیحات ارجاع دهنده   </label>
              <div class="col-md-9">
                  <?php echo e($tdlAssignedToThisUser->descriptionAssigner ?? ''); ?>

              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">وضعیت بررسی ارجاع دهنده   </label>
              <div class="col-md-9">
                  <span class="badge badge-<?php echo e($tdlAssignedToThisUser->status_button ?? ''); ?>">
                  <?php echo e($tdlAssignedToThisUser->status ?? ''); ?>

                  </span>
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

        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl/updateAssignedToOther/<?php echo e($tdlAssignedToOther->id); ?>" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-body">

            <input type="text" name="status" value="<?php echo e($tdlAssignedToOther->status); ?>" hidden>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="name" value=" <?php echo e($tdlAssignedToOther->name); ?> "  class="form-control" name="name">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3" cols="30"><?php echo e($tdlAssignedToOther->description); ?></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignedTo">متولی انجام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <select id="selectize-state" name="assignedTo[]" class="selectize-event required" multiple>
                  <option class="" value="">انتخاب متولی</option>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e(in_array($user->id, $tdlAssignedToOther->users->pluck('id')->toArray()) ? 'selected' : ''); ?>><?php echo e($user->name . " " . $user->family); ?> | <?php echo e($user->position); ?></option>
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

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="assignerAttachment">دانلود فایل ضمیمه</label>
                <div class="col-md-9">
                    <a target="_blank" href="/<?php echo e($tdlAssignedToOther->assignerAttachment); ?>">
                         <?php echo $tdlAssignedToOther->assignerAttachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "بدون فایل"; ?>

                    </a>
                </div>
            </div>

          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> ویرایش
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
<!--  End Edit Task Assigned to Other -->



<!--  Start Edit EditOtherTaskForAssigner -->
<?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Newtdl/updateAssignerStatus/<?php echo e($tdlAssignedToOther->id); ?>" class="form form-horizontal form-bordered striped-rows">
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
                            <option class="form-control" <?php echo e($user->pivot->statusAssigner == "تایید شده" ? "selected"  : ""); ?>  value="تایید شده">تایید شده</option>
                            <option class="form-control" <?php echo e($user->pivot->statusAssigner == "رد شده" ? "selected"  : ""); ?> value="رد شده">رد شده</option>
                            <option class="form-control" <?php echo e($user->pivot->statusAssigner == "متوقف" ? "selected"  : ""); ?> value="متوقف">متوقف</option>
                            <option class="form-control" <?php echo e($user->pivot->statusAssigner == "برگشت خورده" ? "selected"  : ""); ?> value="برگشت خورده">برگشت خورده</option>
                        </select>
                        </div>

                    </div>

                    <div class="form-group row">
                    <label class="col-md-3 label-control" for="descriptionAssigner">توضیحات ضمیمه </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="descriptionAssigner" rows="3" cols="30"><?php echo e($user->pivot->descriptionAssigner); ?></textarea>
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
                <label class="col-md-3 label-control">شرح  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->description ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">ارجاع دهنده  </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family); ?>

                </div>
            </div>


            <?php $__currentLoopData = $tdlAssignedToOther->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group row">
                    <label class="col-md-3 label-control">متولی های انجام</label>
                    <div class="col-md-9 text-left">
                        <?php echo e($user->name  . " " . $user->family); ?>

                        <span class="badge <?php echo e($user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>">
                            <?php echo e($user->pivot->status); ?>

                        </span>
                        فایل پیوست :
                        <a target="_blank" href="<?php echo e($user->pivot->attachment); ?>">
                            <?php echo $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?>

                        </a>
                        نتیجه :
                        <span><?php echo e($user->pivot->result ?? '---'); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div class="form-group row">
                <label class="col-md-3 label-control"> اهمیت  </label>
                <div class="col-md-9">
                    <span class="badge badge-<?php echo e($tdlAssignedToOther->priority_button); ?>">
                        <?php echo e($tdlAssignedToOther->priority ?? ''); ?>

                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
                <div class="col-md-9">
                    <a target="_blank" href="/<?php echo e($tdlAssignedToOther->assignerAttachment); ?>">
                        <?php echo $tdlAssignedToOther->assignerAttachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "بدون فایل"; ?>

                   </a>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">تاریخ ایجاد  </label>
                <div class="col-md-9">
                    <?php echo e(jdate($tdlAssignedToOther->created_at)->format('Y/m/d') ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">توضیحات ارجاع دهنده   </label>
                <div class="col-md-9">
                    <?php echo e($tdlAssignedToOther->descriptionAssigner ?? ''); ?>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">وضعیت بررسی ارجاع دهنده   </label>
                <div class="col-md-9">
                    <span class="badge badge-<?php echo e($tdlAssignedToOther->status_button ?? ''); ?>">
                    <?php echo e($tdlAssignedToOther->status ?? ''); ?>

                    </span>
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


<!--  Start detail  status Assigned to Me showDetailStatusAssigner -->
<?php $__currentLoopData = $tdlsAssignedToThisUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToThisUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="font-family:Byekan" class="modal fade text-left" id="showDetailStatusAssigner<?php echo e($tdlAssignedToThisUser->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($tdlAssignedToThisUser->id); ?>" aria-hidden="true">
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

            <?php $__currentLoopData = $tdlAssignedToThisUser->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user->id == auth()->user()->id): ?>
                <div class="form-group row">
                    <label class="col-md-3 label-control"> توضیحات ارجاع دهنده  </label>
                    <div class="col-md-9">
                        <?php echo e($user->pivot->descriptionAssigner ?? ''); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">وضعیت تایید ارجاع دهنده   </label>
                    <div class="col-md-9">
                        <span class="badge badge-<?php echo e($user->status_assigner_pivot); ?>">
                            <?php echo e($user->pivot->statusAssigner); ?>

                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">تاریخ درج  </label>
                    <div class="col-md-9">
                        <?php echo e(jdate($user->pivot->updated_at)->format('Y/m/d') ?? ''); ?>

                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       <th>تاریخ ایجاد</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      <?php $__currentLoopData = $tdlsAssignedToOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdlAssignedToOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($tdlAssignedToOther->id); ?></td>
                        <td style="white-space: pre-wrap"><a style="color:#007bff !important" data-toggle="modal" data-target="#DetailOtherTask<?php echo e($tdlAssignedToOther->id); ?>"><?php echo e($tdlAssignedToOther->name ?? ''); ?></a></td>


                        <td><?php echo e($tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family); ?></td>
                        <td style="white-space:normal">
                            <?php $__currentLoopData = $tdlAssignedToOther->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user->pivot->status == 'انجام شده'): ?>
                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner<?php echo e($tdlAssignedToOther->id); ?>User<?php echo e($user->id); ?>" >
                                        <?php echo e($user->name  . " " . $user->family); ?> -
                                    </a>
                                <?php else: ?>
                                    <?php echo e($user->name  . " " . $user->family); ?> -
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <span class="badge badge-<?php echo e($tdlAssignedToOther->priority_button); ?>">
                                <?php echo e($tdlAssignedToOther->priority ?? ''); ?>

                            </span>
                        </td>
                        <td>
                            <span class="badge badge-<?php echo e($tdlAssignedToOther->status_button ?? ''); ?>">
                                <?php echo e($tdlAssignedToOther->status ?? ''); ?>

                                </span>
                        </td>

                       <td style="direction: ltr" ><?php echo e(jdate($tdlAssignedToOther->created_at)->format('Y/m/d')); ?></td>

                        <td style="text-align:center;" >
                            <?php if(auth()->user()->id == $tdlAssignedToOther->user->id ): ?>
                                <a data-toggle="modal" data-target="#EditOtherTask<?php echo e($tdlAssignedToOther->id); ?>" >
                                    <i style="font-size: 20px; color: #007bff" class="ft-edit"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center;" >
                            <?php if(auth()->user()->id == $tdlAssignedToOther->user->id ): ?>
                            <form action="/Newtdl/delete/<?php echo e($tdlAssignedToOther->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-sm" onclick="return confirm('آیا برای حذف اطمینان دارید؟')" >
                                    <i style="font-size: 20px;color: red" class="ft-x-square"></i>
                                </button>
                            </form>
                            <?php endif; ?>
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
                        <p class="card-text text-info">لیست ذیل شامل تمامی فعالیت های ارجاع داده شده توسط دیگران به شما میباشد. شما میتوانید با کلیک برروی آیکون تغییرات فعالیت مورد نظر را بروزرسانی کنید.</p>
                        <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                          <thead>
                            <tr style="text-align: center;">
                              <th>ردیف</th>
                              <th>نام فعالیت</th>
                              <th>ارجاع دهنده</th>
                              <th>اهمیت</th>
                              <th>آخرین وضعیت</th>
                              <th> وضعیت شما</th>
                              

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

                              <td><?php echo e($tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family); ?></td>

                                <td>
                                    <span class="badge badge-<?php echo e($tdlAssignedToThisUser->priority_button); ?>">
                                        <?php echo e($tdlAssignedToThisUser->priority ?? ''); ?>

                                    </span>
                                </td>

                                <?php $__currentLoopData = $tdlAssignedToThisUser->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->id == auth()->user()->id): ?>
                                        <td>
                                            <span class="badge badge-<?php echo e($user->status_assigner_pivot ?? ''); ?>">
                                                <?php echo e($user->pivot->statusAssigner ?? ''); ?>

                                            </span>
                                            <br/>
                                            <a class="text-info" data-toggle="modal" data-target="#showDetailStatusAssigner<?php echo e($tdlAssignedToThisUser->id); ?>" >
                                               ( جزییات)
                                             </a>
                                        </td>
                                        <td>
                                            <span class="badge <?php echo e($user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning'); ?>">
                                                <?php echo e($user->pivot->status); ?>

                                            </span>
                                        </td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              

                              <td style="direction: ltr" ><?php echo e(jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d')); ?></td>
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