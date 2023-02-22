<?php $__env->startSection('content'); ?>
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">ماهواره ها</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('components.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="<?php echo e(route('satellite.store')); ?>" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>
                        <div style="font-family:byekan" class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">نام ماهواره  </label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" name="name">
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
                                <h1 class="">لیست ماهواره ها  </h1>
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
                                            <th>نام  ماهواره </th>
                                          

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->name); ?></td>
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