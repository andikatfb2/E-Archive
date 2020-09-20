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
									<h3 class="box-title"><?php echo anchor('admin/tm_user/create', '<i class="fa fa-plus"></i> '. lang('tm_user_create_user'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
								</div>
								<div class="box-body">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th><?php echo lang('tm_user_firstname');?></th>
												<th><?php echo lang('tm_user_lastname');?></th>
												<th><?php echo lang('tm_user_email');?></th>
												<th><?php echo lang('tm_user_groups');?></th>
												<th><?php echo lang('tm_user_status');?></th>
												<th><?php echo lang('tm_user_action');?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($tm_user as $user):?>
											<tr>
												<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
												<td>
											<?php
												foreach ($user->groups as $group) {
													// Disabled temporary !!!
													// echo anchor('admin/groups/edit/'.$group->id, '<span class="label" style="background:'.$group->bgcolor.';">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>');
													echo anchor('admin/groups/edit/'.$group->id, '<span class="label label-default">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>');
												}

												?>
												</td>
												<td><?php echo ($user->active) ? anchor('admin/tm_user/deactivate/'.$user->id, '<span class="label label-success">'.lang('tm_user_active').'</span>') : anchor('admin/tm_user/activate/'. $user->id, '<span class="label label-default">'.lang('tm_user_inactive').'</span>'); ?></td>
												<td>
													<?php echo anchor('admin/tm_user/edit/'.$user->id, lang('actions_edit')); ?>
													<?php echo anchor('admin/tm_user/profile/'.$user->id, lang('actions_see')); ?>
												</td>
											</tr>
<?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>
						 </div>
					</div>
				</section>
			</div>
