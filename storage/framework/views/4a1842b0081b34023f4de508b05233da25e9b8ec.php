<?php $__env->startSection('headerscripts'); ?>


    <style media="screen">

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--  Start add Suggestion -->
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> افزودن ضمانت نامه مالی </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="<?php echo e(route('financialGuarantee.store')); ?>" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>


                        <div style="font-family:byekan" class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="subject"> موضوع قرارداد </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="type"> نوع ضمانت نامه </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="type">
                                        <option value="پیش پرداخت">پیش پرداخت</option>
                                        <option value="حسن انجام کار "> حسن انجام کار</option>
                                        <option value="شرکت در مناقصه">شرکت درمناقصه</option>
                                        <option value="حسن انجام تعهدات">حسن انجام تعهدات</option>
                                        <option value="کسر از محل مطالبات"> کسر از محل مطالبات</option>
                                        <option value="چک"> چک</option>
                                        <option value="سفته"> سفته</option>


                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="validity_duration"> مدت اعتبار </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="validity_duration">
                                        <option value="سه ماه">سه ماه</option>
                                        <option value="شش ماه ">شش ماه </option>
                                        <option value="یک سال">یک سال</option>
                                        <option value="بدون تاریخ"> بدون تاریخ</option>


                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="status"> آخرین وضعیت </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="تمدید شده">تمدید شده</option>
                                        <option value="تمدید نشده ">تمدید نشده </option>

                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="active_status">  وضعیت فعال </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="active_status">
                                        <option value="گرفته شده">گرفته شده</option>
                                        <option value="تحویل بانک ">تحویل بانک </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name_of_issuing_bank"> نام بانک صادر کننده </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name_of_issuing_bank">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="beneficiary_name">نام ذینفع </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="beneficiary_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="price">مبلغ </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" autocomplete="off" class="form-control"  placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="image">تصویر </label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="image">
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

    <!--  End add Suggestion -->


    <!--  Start Edit $phoneBooks -->


    <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phoneBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="font-family:Byekan" class="modal fade text-left" id="eidtFinancialGuarantee<?php echo e($phoneBook->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($phoneBook->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl<?php echo e($phoneBook->id); ?>">ضمانت نامه مالی</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="financialGuarantee/update/<?php echo e($phoneBook->id); ?>"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="name_of_issuing_bank"> نام بانک صادر کننده </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo e($phoneBook->name_of_issuing_bank); ?>" name="name_of_issuing_bank">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="beneficiary_name">نام ذینفع </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo e($phoneBook->beneficiary_name); ?>" name="beneficiary_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="price">مبلغ </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo e($phoneBook->price); ?>" name="price">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                    <div class="col-md-9">
                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="image">تصویر </label>
                                    <div class="col-md-9">
                                        <input type="file" id="fileMostanadat" class="form-control" name="image">
                                    </div>
                                    <div class="col-md-9">
                                    <?php if($phoneBook->image == "storage/FinancialGuarantee/nothing"): ?>
                                        ---
                                    <?php else: ?>
                                       دانلود ضمیمه <a target="_blank" href="/<?php echo e($phoneBook->image); ?>"> <?php echo $phoneBook->image !== "storage/FinancialGuarantee/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
                                    <?php endif; ?>
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

    <!--  End Edit $phoneBooks -->


     <!--  Start Edit $change active date -->


    <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phoneBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="font-family:Byekan" class="modal fade text-left" id="endDateAdd<?php echo e($phoneBook->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($phoneBook->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="endDateAdd<?php echo e($phoneBook->id); ?>">تمدید ضمانت نامه مالی <?php echo e($phoneBook->subject); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="financialGuarantee/updateEndDate/<?php echo e($phoneBook->id); ?>"  class="form form-horizontal form-bordered striped-rows">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                    <div class="col-md-9">
                                        <input style="font-family:Byekan" autocomplete="off" class="form-control" style="" placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
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

    <!--  End Edit $change active date -->


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


                <?php if($guarantee3->count() > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $guarantee3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    هشدار : ۳ روز تا پایان قرارداد
                                    <?php echo e($item->subject); ?>

                                    مانده است
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($guarantee7->count() > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $guarantee7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                هشدار : ۷ روز تا پایان قرار داد
                                <?php echo e($item->subject); ?>

                                مانده است
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> ضمانت نامه های مالی  </h4>
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

                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center; width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th> ردیف</th>
                                            <th> موضوع قرارداد</th>
                                            <th> نوع ضمانت نامه</th>

                                              <th>  نام بانک صادر کننده</th>

                                            <th> مدت اعتبار</th>
                                            <th> آخرین وضعیت</th>
                                            <th> وضعیت فعال</th>
                                            <th> نام ذینفع</th>

                                            <th> مبلغ</th>
                                            <th>  تاریخ اتمام</th>
                                            <th>مشاهده تصویر</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td style="white-space: normal;"><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php echo e($archive->subject); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->type); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->name_of_issuing_bank); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->validity_duration); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->status); ?>

                                                </td>
                                                <td>
                                                    <span class="<?php echo e($archive->active_status == 'تحویل بانک' ? 'badge-success' : 'badge-warning'); ?>">
                                                        <?php echo e($archive->active_status); ?>

                                                    </span>

                                                </td>


                                                <td>
                                                    <?php echo e($archive->beneficiary_name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(number_format($archive->price)); ?>

                                                </td>
                                                <td><?php echo e($archive->end_date ? jdate($archive->end_date)->format('Y/m/d') : '-'); ?></td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    <?php if($archive->image == "storage/FinancialGuarantee/nothing"): ?>
                                                        ---
                                                    <?php else: ?>
                                                        <a target="_blank" href="/<?php echo e($archive->image); ?>"> <?php echo $archive->image !== "storage/FinancialGuarantee/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
                                                    <?php endif; ?>
                                                </td>






                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a style="display:inline" data-toggle="modal" data-target="#eidtFinancialGuarantee<?php echo e($archive->id); ?>" ><i style="font-size: 20px" class="ft-external-link"></i></a>

                                                    <a style="display:inline" title="تمدید" data-toggle="modal" data-target="#endDateAdd<?php echo e($archive->id); ?>" ><i style="font-size: 20px" class="ft-clock"></i></a>

                                                    <form style="display:inline" class="" action="<?php echo e(url('financialGuarantee/delete', $archive->id)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button style="display:inline; border: none" onclick="return confirm('آیا برای حذف اطمینان دارید؟');" type="submit">
                                                            <i style="font-size: 20px" class="ft-x-square danger"></i>
                                                        </button>
                                                      </form>


                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>