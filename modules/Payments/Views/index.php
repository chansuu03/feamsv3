<?= $this->extend('adminlte') ?>

<?= $this->section('page_header') ?>
<div class="row mb-2">
    <div class="col-sm-6">
            <h1><?= esc($title)?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= esc($title)?></li>
        </ol>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if(!empty(session()->getFlashdata('failMsg'))):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('failMsg');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif;?>
<?php if(!empty(session()->getFlashdata('successMsg'))):?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('successMsg');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif;?>

<div class="card">
  <?php foreach($perm_id['perm_id'] as $perms):?>
    <?php if($perms == '39'):?>
      <div class="card-header">
        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/payments/add')?>" role="button">Add Payment</a>
        </div>
      </div>
    <?php endif;?>
  <?php endforeach;?>
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th style="width: 50%;">Name</th>
          <th>Cost</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $ctr = 1?>
        <?php foreach($payments as $payment):?>
          <tr>
            <td><?= esc($ctr)?></td>
            <td><?= esc($payment['name'])?></td>
            <td><?= esc($payment['cost'])?></td>
            <td>
              <a class="btn btn-info btn-sm" href="<?= base_url()?>/announcements/<?= esc($payment['id'])?>" role="button"><i class="fas fa-bars"></i></a>
              <button type="button" value="<?= esc($payment['id'])?>" class="btn btn-danger btn-sm del" data-toggle="tooltip" data-placement="bottom" title="Delete Payment"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
          <?php $ctr++;?>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
// BS4 tooltips
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  
  // DataTables
  $(function () {
    $('.table').DataTable({
        "responsive": true,
        "autoWidth": false,
      });
  });
</script>

<!-- SweetAlert JS -->
<script src="<?= base_url();?>/js/sweetalert.min.js"></script>
<script src="<?= base_url();?>/js/sweetalert2.all.min.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript">

  $(document).ready(function ()
  {
    $('.del').click(function (e)
    {
      e.preventDefault();
      var link = $(this).val();
      console.log(link);

      Swal.fire({
        icon: 'question',
        title: 'Delete?',
        text: 'Are you sure to delete payment?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      })/*swal2*/.then((result) =>
      {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed)
        {
          window.location = 'payments/delete/' + link;
        }
        else if (result.isDenied)
        {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })//then
    });
  });
</script>
<?= $this->endSection() ?>
    