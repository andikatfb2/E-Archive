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
                                <div class="box-body">
                                    <div class="col-md-6">
                                         <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title col-md-8">Divisi Dokumen</h3>
                                                <span class="box-title col-md-4"><?php echo anchor('admin/groups/create_divisi', '<i class="fa fa-plus"></i> '. 'Tambah Divisi', array('class' => 'btn btn-block btn-primary btn-flat')); ?></span>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no =1; foreach ($tr_divisi as $values):?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $values->divisi_id; ?></td>
                                                        <td><?php echo $values->divisi_name; ?></i></td>
                                                        <td><?php echo anchor_confirmation("admin/groups/delete_divisi/".$values->divisi_id, '<span style="color:red">delete</span>'); ?></td>
                                                    </tr>
                                                    <?php $no++; endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="box-body">
                                    <div class="col-md-6">
                                         <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title col-md-8">Jenis Dokumen</h3>
                                                <span class="box-title col-md-4"><?php echo anchor('admin/groups/create_jenis', '<i class="fa fa-plus"></i> '. 'Tambah Jenis Dokumen', array('class' => 'btn btn-block btn-primary btn-flat')); ?></span>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1; foreach ($tr_jenis as $values):?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $values->jenis_id; ?></td>
                                                        <td><?php echo $values->jenis_name; ?></i></td>
                                                        <td><?php echo anchor_confirmation("admin/groups/delete_jenis/".$values->jenis_id, '<span style="color:red">delete</span>'); ?></td>
                                                    </tr>
                                                    <?php $no++; endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
