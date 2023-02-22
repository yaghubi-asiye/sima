<?php $__env->startSection('headerscripts'); ?>
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">

<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
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
                    <h4 class="modal-title" id="myModalLabel17">مناقصات</h4>
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
                          action="tenders" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>
                        <div style="font-family:byekan" class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نوع درخواست<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="type">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کارشناس دریافت کننده<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="karshenasDaryaft">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نحوده دریافت<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="nahveDaryaft">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مناقصه گذار<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="monagheseGozar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">موضوع یا نام  پروژه<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mozoo">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کد شناسایی مناقصه گذار</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="codeMonagheseGozar">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کد شناسایی سامانه ستاد ایران</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="codeSamaneSetadIran">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ دریافت<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="dateRecieved" type="text" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل پیوست دریافتی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="peyvastDaryafti">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">زمان جلسه پرسش و پاسخ</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="timeJalasePorseshPasokh" type="text" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مهلت ارسال پاسخ<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mohlat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ بازگشایی</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="tarikhBazgoshaei" type="text" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نام و شماره تماس کارشناس کارفرما</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="namePhoneKarfarma">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مبلغ ضمانت شرکت در مناقصه</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mablaghZemanat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مدت قرارداد</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="moddatGharardad">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="assignedTo">ارجاع به
                                    
                                </label>
                                <div class="col-md-9">

                                  <select id="selectize-state" name="assignedTo" class="form-control selectize-event required">
                                    <option class="" value="">انتخاب متولی</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . " " . $user->family); ?> | <?php echo e($user->position); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>

                                </div>
                              </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نظریه کمیسیون توان</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="nazarieKomisionTavan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کارشناس پیگیری و ارسال مستندات</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="karshenasPaygiri">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مبلغ استعلام بها(تومان)</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mablaghEstelam">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر ضمانت</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirZemanat">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر پیشنهاد فنی و اسناد ارزیابی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadFanni">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر پیشنهاد قیمت</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadGheymat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل پیوست ارسالی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="attachmentErsali">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نتیجه مناقصه</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="natijeMonaghese">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">پاسخ کارفرما</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="paasokhKarfarma">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">آخرین اقدامات</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="akharinEghdamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ استرداد ضمانتنامه</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="tarikhEsterdadZemanat" type="text"/>
                                </div>
                            </div>





                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
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

      <!--  Start Edit $invoices -->
      <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div style="font-family:Byekan" class="modal fade text-left" id="statusInvoiceModal<?php echo e($invoice->id); ?>" tabindex="-1" role="dialog" aria-labelledby="statusInvoiceModal<?php echo e($invoice->id); ?>" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div style="text-align: center!important;" class="modal-header">
                      <h4 style="text-align: center!important;" class="modal-title" id="statusInvoiceModal<?php echo e($invoice->id); ?>"> ثبت وضعیت  مناقصه</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div  style=" direction: rtl;" class="modal-body">


                      <form style="vertical-align:center;text-align:center" method="post" action="/tenders/updateStatusTender" class="form form-horizontal form-bordered striped-rows">
                          <?php echo csrf_field(); ?>
                          <div class="form-body">
                            <input type="hidden" name="id" value="<?php echo e($invoice->id); ?>">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تعیین وضعیت </label>
                                <div class="col-md-9">
                                    <select  class="form-control" name="status">
                                        <option value="">وضعیت مناقصه  انتخاب شده را انتخاب کنید</option>
                                        <option value="برنده">برنده </option>
                                        <option value="بازنده"> بازنده </option>
                                    </select>
                                </div>
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
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!--  End Edit $invoices -->


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">کار پذیری </h4>
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
                                <button style="float: left;margin-left: 40px!important;"
                                        class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"
                                        data-target="#addUser" data-toggle="modal"><span class="ladda-label">  <i
                                                class="ft-plus"></i> افزودن </span></button>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>توسط</th>
                                            
                                            
                                            <th>کارشناس دریافت کننده</th>
                                            
                                            <th>مناقصه گذار</th>
                                            <th>موضوع یا نام  پروژه </th>























                                                <th>وضعیت</th>

                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="<?php echo e(url('tenders/show/' . $tender->id)); ?>"><?php echo e($tender->user->name ?? ''); ?> <?php echo e($tender->user->family ?? ''); ?></a></td>
                                                
                                                
                                                <td><?php echo e($tender->karshenasDaryaft); ?></td>
                                                
                                                <td style="white-space: normal"><?php echo e($tender->monagheseGozar); ?></td>
                                                <td style="white-space: normal"><?php echo e($tender->mozoo); ?></td>
























                                                    <td>
                                                        <?php if($tender->status == 'مشخص نشده'): ?>
                                                        <a data-toggle="modal" data-target="#statusInvoiceModal<?php echo e($tender->id); ?>"  class="btn <?php if($tender->status == 'برنده'): ?> btn-success <?php elseif($tender->status == 'بازنده'): ?> btn-danger <?php else: ?> btn-warning <?php endif; ?> ">
                                                            <?php echo e($tender->status); ?>

                                                        </a>
                                                        <?php elseif($tender->status == 'برنده'): ?>
                                                            <span class="badge badge-success">
                                                               ( <?php echo e($tender->status); ?>)

                                                                    <?php if($tender->mablaghEstelam <= 100000000): ?>
                                                                    <a href="<?php echo e(route('CommissionPartial.create', ['type'=> get_class($tender), 'id' => $tender->id])); ?>" >
                                                                        ثبت معامله
                                                                        <span class="badge badge-danger">
                                                                        جزیی
                                                                        </span>
                                                                    </a>
                                                                    <a href="<?php echo e(route('CommissionMajor', ['type'=>get_class($tender),'id' => $tender->id])); ?>" title="نمایش لیست معاملات  ">
                                                                        <i style="font-size: 20px" class="ft-list primary"></i>
                                                                    </a>
                                                                    <?php else: ?>
                                                                    <a href="<?php echo e(route('CommissionMajor.create', ['type'=> get_class($tender), 'id' => $tender->id])); ?>" >
                                                                        ثبت معامله
                                                                        <span class="badge badge-danger">
                                                                        کلی
                                                                        </span>
                                                                    </a>
                                                                    <a href="<?php echo e(route('CommissionMajor', ['type'=>get_class($tender),'id' => $tender->id])); ?>" title="نمایش لیست معاملات  ">
                                                                        <i style="font-size: 20px" class="ft-list primary"></i>
                                                                    </a>
                                                                    <?php endif; ?>

                                                            </span>

                                                        <?php else: ?>
                                                        <a href="#" class="btn <?php if($tender->status == 'برنده'): ?> btn-success <?php elseif($tender->status == 'بازنده'): ?> btn-danger <?php else: ?> btn-warning <?php endif; ?> ">
                                                            <?php echo e($tender->status); ?>

                                                        </a>
                                                        <?php endif; ?>

                                                    </td>

                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;">
                                                    <a href="<?php echo e(route('tenders.edit', $tender->id)); ?>"> <i class="fa fa-edit"></i> </a>
                                                    <a href="tenders/delete/<?php echo e($tender->id); ?> "><i style="font-size: 20px" class="ft-x-square danger"></i></a>
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
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>