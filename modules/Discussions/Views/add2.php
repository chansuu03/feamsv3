<?= $this->extend('adminlte') ?>

<?= $this->section('styles') ?>
  <style>
    .required:after {
        content:" *";
        color: red;
    }
   </style>
<?= $this->endSection() ?>

<?= $this->section('page_header');?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $edit ? 'Edit': 'Add'?> <?= esc($title)?></h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('discussions');?>">Discussions</a></li>
            <li class="breadcrumb-item active"><?= $edit ? 'Edit': 'Add'?></li>
        </ol>
    </div><!-- /.col -->
</div>
<?= $this->endSection();?>

<?= $this->section('content') ?>

<form action="<?= base_url('discussions')?>/<?= $edit ? 'edit/'.esc($link): 'add'?>/<?= esc($id)?>" method="post" enctype="multipart/form-data">

<div class="card card-light">
    <div class="card-body">
        <div class="form-group"> <!-- Subject -->
            <label for="subject" class="required">Subject</label>
            <input type="text" class="form-control <?=isset($errors['subject']) ? 'is-invalid': ''?>" id="subject" name="subject" placeholder="Enter subject" value="<?=isset($value['subject']) ? esc($value['subject']): ''?>">
            <?php if(isset($errors['subject'])):?>
                <div class="invalid-feedback">
                    <?=esc($errors['subject'])?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="float-end btn btn-primary btn-sm" >Submit</button>
    </div>
</div>
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts');?>

<?= $this->endSection() ?>