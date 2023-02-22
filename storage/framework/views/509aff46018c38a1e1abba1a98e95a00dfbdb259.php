<?php $__env->startSection('headerscripts'); ?>
<style media="screen">



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

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ثبت درخواست خرید </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت درخواست خرید برای پیش فاکتور با کدویژه <?php echo e($invoice->unique_code); ?></h4>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="<?php echo e(url('PurchaseRequest')); ?>" class="form form-horizontal form-bordered striped-rows">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="invoice_id" value="<?php echo e($invoice->id); ?>">
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="onvan">عنوان خرید</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text"  id="onvan" class="form-control" placeholder="عنوان خرید" name="onvan">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">شرح خرید</label>
                                                                    <div class="col-md-9">
                                                                        <textarea name="description"  rows="8"  class="form-control" cols="80"></textarea>
                                                                    </div>
                                                                </div>

                                                                


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="peymankar">خریدار</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="peymankar"  class="form-control" placeholder="خریدار" name="peymankar">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="mablagh">ارزش خرید </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="mablagh"  class="form-control" placeholder="به تومان وارد شود" name="mablagh">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="pardakht">نحوه پرداخت </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="pardakht"  class="form-control" placeholder="مثال: چک" name="pardakht">
                                                                    </div>
                                                                </div>




                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="moddat">مدت زمان </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="moddat"  class="form-control" placeholder="مثال: یکساله" name="moddat">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="from">تاریخ شروع</label>
                                                                    <div class="col-md-9">
                                                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="from" type="text" id="input1"/>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="to">تاریخ پایان</label>
                                                                    <div class="col-md-9">
                                                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="to" type="text" id="input1"/>

                                                                    </div>
                                                                </div>

                                                                

                                                                <div  class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="contractorFile">آپلود فایل جزییات خرید</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" id="contractorFile" class="form-control" name="contractorFile">
                                                                        

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


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>