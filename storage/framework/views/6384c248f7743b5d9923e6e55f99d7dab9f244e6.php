<?php $__env->startSection('headerscripts'); ?>
<style media="screen">

.amcharts-legend-value{
  font-size: 20px!important;
  font-weight: bold!important;
}
.amcharts-legend-label{
  font-weight: bold!important;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن تامین کننده</h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="avl" class="form form-horizontal form-bordered striped-rows">
          <?php echo csrf_field(); ?>
          <div style="font-family:byekan" class="form-body">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نوع فعالیت</label>
              <div class="col-md-9">
                <input type="text" id="noefaAliat" class="form-control" placeholder="نوع فعالیت" name="noefaAliat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">اولویت</label>
              <div class="col-md-9">
                <input type="text" id="description" class="form-control" placeholder="اولویت" name="olaviat">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="contractor">نام شرکت</label>
              <div class="col-md-9">
                <input type="text" id="contractor" class="form-control" placeholder="نام شرکت" name="namesherkat">
              </div>
            </div>


            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">نام رابط </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="نام رابط" name="namerabet">
              </div>
            </div>

            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">آدرس </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="آدرس" name="address">
              </div>
            </div>




            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">کد پستی</label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="کد پستی" name="codeposti">
              </div>
            </div>



            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">تلفن</label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="تلفن" name="tel">
              </div>
            </div>



            <div class="form-group row ">
              <label class="col-md-3 label-control" for="to">فکس</label>
              <div class="col-md-9">
                <input type="text" id="to" class="form-control" placeholder="فکس" name="fax">
              </div>
            </div>



            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">نام مدیر عامل </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="نام مدیر عامل" name="namemodiramel">
              </div>
            </div>

            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">همراه </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="همراه" name="hamrah">
              </div>
            </div>


            <div class="form-group row ">
              <label class="col-md-3 label-control" for="from">برند </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="برند" name="brand">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">ایمیل </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="ایمیل" name="email">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">وبسایت </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="وبسایت" name="website">
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


<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">لیست شرکت های تامین کننده کالا و خدمات </h4>
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
                      <th>نوع فعالیت</th>
                      <th>اولویت</th>
                      <th>نام شرکت</th>
                      <th>نام رابط</th>


                      <th>تلفن</th>






                      <th>عملیات</th>

                    </tr>
                  </thead>
                  <tbody>

                  <?php $__currentLoopData = $avls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($loop->iteration); ?></td>
                        <td style="white-space: normal"><a href="<?php echo e(url('avl/show/' . $avl->id)); ?>"><?php echo e($avl->noefaAliat); ?></a></td>
                      <td><?php echo e($avl->olaviat); ?></td>
                      <td><?php echo e($avl->namesherkat); ?></td>
                      <td style="white-space: normal"><?php echo e($avl->namerabet); ?></td>


                      <td><?php echo e($avl->tel); ?></td>






                      <td style="text-align:center;color: #3BAFDA">

                          <a href="avl/delete/<?php echo e($avl->id); ?>"><i style="font-size: 20px" class="ft-x-square danger"></i>  </a>
                          <a href="avl/edit/<?php echo e($avl->id); ?>">
                              <i style="font-size: 20px" class="ft-edit primary"></i>
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
<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>