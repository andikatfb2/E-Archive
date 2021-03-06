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
                                    <h3 class="box-title">Tambah Divisi Dokumen</h3>
                                </div>
                                <div class="box-body">
                                    <?php //echo $message;?>

                                    <?php echo form_open('admin/groups/store_divisi', array('class' => 'form-horizontal', 'id' => 'form-create_group')); ?>
                                        <div class="form-group">
                                            <label for="divisi" class="col-sm-2 control-label">Nama Divisi</label>
                                            <?php echo lang('divisi_name', 'divisi_name', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                 <input type="text" name="divisi_name" placeholder="nama divisi" id="divisi_name"  class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/groups', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
