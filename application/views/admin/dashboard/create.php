<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tambah Dokumen</h3>
                                </div>
                                <div class="box-body">
                                   <center style="color:red"><?php echo $error;?></center> 

                                    <?php echo form_open('admin/dashboard/store', 
                                    array('class' => 'form-horizontal', 'id' => 'form-create_group', 'enctype' => 'multipart/form-data')); ?>
                                        <div class="form-group">
                                            <label for="divisi" class="col-sm-2 control-label">Divisi</label>
                                            <?php echo lang('divisi', 'divisi', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                               <select class="form-control" name="divisi">
                                                    <?php foreach ($tr_divisi as $item):?>
                                                        <option value="<?php echo $item->divisi_id ?>"><?php echo $item->divisi_name ?></option>
                                                   <?php endforeach;?>
                                                   <option value="">-None-</option>
                                               </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="jenis" class="col-sm-2 control-label">Jenis Dokumen</label>
                                            <?php echo lang('jenis', 'jenis', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis">
                                                    <?php foreach ($tr_jenis as $item):?>
                                                        <option value="<?php echo $item->jenis_id ?>"><?php echo $item->jenis_name ?></option>
                                                   <?php endforeach;?>
                                                   <option value="">-None-</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                                            <?php echo lang('tahun', 'tahun', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-10">
                                                <input type="text" name="tahun" placeholder="2019" id="nama_nomor"  maxlength="4" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class="col-sm-2 control-label">Nama Dokumen</label>
                                            <?php echo lang('nama', 'nama', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" placeholder="Nama Dokumen " id="nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor" class="col-sm-2 control-label">Nomor Dokumen</label>
                                            <?php echo lang('nomor', 'nomor', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-10">
                                                <input type="text" name="nomor" placeholder="Nomor Dokumen" id="nama_nomor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_path" class="col-sm-2 control-label">Dokumen Upload</label>
                                            <?php echo lang('file_path', 'file_path', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-10">
                                                <input type="file" name="file_path"  class="form-file" >   
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => 'Simpan ')); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => 'Batal')); ?>
                                                    <?php echo anchor('admin/dashboard/', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
