<?php if(session()->has('updateUser')): ?>
  <script type="text/javascript">
  $(document).ready(function(){
    swal({
      title: "<?php echo e(\Session::get('updateUser')['flash_title']); ?>",
      text: "<?php echo e(\Session::get('updateUser')['flash_message']); ?>",
      icon: "<?php echo e(\Session::get('updateUser')['flash_level']); ?>",
      button: "<?php echo e(\Session::get('updateUser')['flash_button']); ?>",
      timer: 3000
    });
  });



  </script>
<?php endif; ?>


<?php if(session()->has('permissionDenied')): ?>
  <script type="text/javascript">
  $(document).ready(function(){
    toastr.<?php echo e(\Session::get('permissionDenied')['flash_level']); ?>('<?php echo e(\Session::get('permissionDenied')['flash_message']); ?>', '<?php echo e(\Session::get('permissionDenied')['flash_title']); ?>');
  });
  </script>
<?php endif; ?>
