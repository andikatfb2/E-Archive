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
                                
                                <div class="box-body">
                                   <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_group')); ?>
                                        <div class="form-group">
                                            <label for="divisi" class="col-sm-2 control-label">Divisi</label>
                                            <?php echo lang('divisi', 'divisi', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-6">
                                              <input type="text" name="divisi" placeholder="PEMILU" id="divisi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis" class="col-sm-2 control-label">Jenis Dokumen</label>
                                            <?php echo lang('jenis', 'jenis', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-6">
                                                <input type="text" name="jenis" placeholder="SK" id="jenis" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun" class="col-sm-2 control-label">Tahun Dokumen</label>
                                            <?php echo lang('tahun', 'tahun', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-6">
                                                <input type="text" name="tahun" placeholder="2019" id="tahun" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_nomor" class="col-sm-2 control-label">Nama / Nomor Dokumen</label>
                                            <?php echo lang('nama_nomor', 'nama_nomor', array('class' => 'col-sm-1 control-label')); ?>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_nomor" placeholder="Nama Dokumen / Nomor Dokumen" id="nama_nomor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <div class="btn-group">
                                                <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => 'Cari Dokumen'));?> 
                                                <?php echo anchor('admin/dashboard/index', 'Batal', array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?><hr>

                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Divisi Dokumen</th>
                                                <th>Jenis Dokumen</th>
                                                <th>Tahun Dokumen</th>
                                                <th>Nama Dokumen</th>
                                                <th>Nomor Dokumen</th>
                                                <th>Dokumen Upload</th>
                                                <th>
                                                    <!-- <div class="box-header with-border"> -->
                                                        <span class="box-title"><?php echo anchor('admin/dashboard/create', '<i class="fa fa-plus"></i> Tambah Dokumen', array('class' => 'btn btn-block btn-primary btn-flat')); ?></span>
                                                    <!-- </div> -->
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;
                                             foreach ($tm_file_uploads as $values):?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $values->divisi_name; ?></td>
                                                <td><?php echo $values->jenis_name; ?></td>
                                                <td><?php echo $values->tahun; ?></td>
                                                <td><?php echo $values->file_name; ?></td>
                                                <td><?php echo $values->file_number; ?></td>
                                                <td><?php echo str_replace('_', ' ', $values->file_path); //$values->file_path;   ?></td>
                                                <td><?php echo anchor("admin/dashboard/see/".$values->file_id, '<i class="fa fa-eye"> Lihat '); ?>  &nbsp;&nbsp;&nbsp; 
                                                    <?php echo anchor_confirmation("admin/dashboard/delete/".$values->file_id, '<i class="fa fa-trash" style="color:red" > Hapus'); ?>
                                                </td>
                                            </tr>
                                            <?php $no++;
                                             endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
