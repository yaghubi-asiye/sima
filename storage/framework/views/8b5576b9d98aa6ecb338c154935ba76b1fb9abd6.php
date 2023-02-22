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
    font-family: 'Byekan', serif !important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
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

        <form  style="vertical-align:center;text-align:center" method="post"  action="timesheet/add" enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="description"   class="form-control" name="description">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">نحوه ارجاع کار <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control" name="assignment">
                  <option value="اتوماسیون">اتوماسیون</option>
                  <option value="مدیر مافوق">مدیر مافوق</option>
                  <option value="همکار">همکار</option>
                  <option value="خودم">خودم</option>
                  <option value="مدیرعامل">مدیرعامل</option>
                </select>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">نام کارفرما <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="kaarfarma" class="form-control" name="kaarfarma">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">نام پروژه <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="projectName" class="form-control" name="projectName">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="result">اسناد کارفرما </label>
              <div class="col-md-9">
                <input type="file" name="attach1" id="">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">ساعت شروع </label>
              <div class="col-md-9">
                <input type="text" id="startHour"  placeholder="مثال: 12:10" class="form-control" name="startHour">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">ساعت پایان </label>
              <div class="col-md-9">
                <input type="text" id="endHour"  placeholder="مثال: 10:25" class="form-control" name="endHour">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">مدت زمان صرف شده به دقیقه <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <input type="text" id="minutes"  placeholder="مثال: 125" class="form-control" name="minutes">

              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="result">نتیجه <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <textarea name="result" class="form-control" rows="3" cols="80"></textarea>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">علت عدم تحقق </label>
              <div class="col-md-9">

                <input type="text" id="holdpoint"  placeholder="" class="form-control" name="holdpoint">

              </div>
            </div>





            <div class="form-group row">
              <label class="col-md-3 label-control" for="result">اسناد ارسالی  </label>
              <div class="col-md-9">
                <input type="file" name="attach2" id="">
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





<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

      <?php if($errors->any()): ?>
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>





      <!-- Start TimeSheet Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">فعالیت های روزانه شما</h4>
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
                  <table style="font-family:Byekan;direction: rtl; width: 100%" class="table display  table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>تاریخ و زمان ثبت</th>

                        <th>نحوه ارجاع کار</th>
                        <th>نام کارفرما</th>
                        <th>نام پروژه</th>
                        <th>ساعت شروع</th>
                        <th>ساعت پایان</th>





                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($timesheet->id); ?></td>
                        <td><?php echo e(jdate($timesheet->created_at)); ?></td>

                        <td><a href="<?php echo e(url('timesheet/show/' . $timesheet->id)); ?>"><?php echo e($timesheet->assignment); ?></a></td>
                          <td><a href="<?php echo e(url('timesheet/show/' . $timesheet->id)); ?>"><?php echo e($timesheet->kaarfarma); ?></a></td>
                        <td><?php echo e($timesheet->projectName); ?></td>
                        <td><?php echo e($timesheet->startHour); ?></td>
                        <td><?php echo e($timesheet->endHour); ?></td>





                        <td style="text-align:center;color: red" > <a href="/timesheet/delete/<?php echo e($timesheet->id); ?>" ><i style="font-size: 20px;color: red" class="ft-x-square"></i></a>  </td>
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
      <!-- End TimeSheet Table -->





<?php if(\Auth::user()->email === 'rahmani@persiatc.com' OR \Auth::user()->email === 'tavakoli@persiatc.com' OR \Auth::user()->email === 'torkaman@persiatc.com' OR \Auth::user()->email === 'khanbeigi@persiatc.com' ): ?>
      <!-- Start Personnels TimeSheet Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">فعالیت های پرسنل</h4>
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
                  <table style="font-family:Byekan;direction: rtl; width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                    <tr style="text-align: center;">
                      <th>ردیف</th>
                      <th>نام و نام خانوادگی</th>
                      <th>تاریخ و زمان ثبت</th>

                      <th>نحوه ارجاع کار</th>
                      <th>نام کارفرما</th>


                      




                      <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center" >

                    <?php $__currentLoopData = $personnelTimesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnelTimesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($personnelTimesheet->id); ?></td>
                          <td>
                            <a href="<?php echo e(url('timesheet/show/' . $personnelTimesheet->id)); ?>">
                                <?php echo e(\App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('name')->first() . ' ' . \App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('family')->first()); ?>- کارمند
                            </a>
                        </td>
                        <td><?php echo e(jdate($personnelTimesheet->created_at)); ?></td>

                        <td><?php echo e($personnelTimesheet->assignment); ?></td>
                        <td><?php echo e($personnelTimesheet->kaarfarma); ?></td>


                        




                        <td style="text-align:center;color: red" > <a href="/timesheet/delete/<?php echo e($personnelTimesheet->id); ?>" ><i style="font-size: 20px;color: red" class="ft-x-square"></i></a>  </td>
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
      <!-- End Personnels TimeSheet Table -->
<?php endif; ?>





    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>