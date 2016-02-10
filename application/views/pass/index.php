<?php $this->load->view('pass/header');?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Accounts
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Account</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Date Added</th>
                                        <th>Date Modified</th>
                                        <th>Password</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($accounts)) { ?>
                                        <?php foreach($accounts as $account) { ?>
                                        <tr>
                                            <td><?php echo $account->account; ?></td>
                                            <td><?php echo $account->username; ?></td>
                                            <td><?php echo $account->email; ?></td>
                                            <td><?php echo $account->date_added; ?></td>
                                            <td><?php echo $account->last_modified; ?></td>
                                            <td class="ESf"><button type="button" class="btn btn-primary btn-xs showPass" restie= "<?php echo $account->id; ?>">Show Password</button></td>
                                            <td><a href="#"><i class="fa fa-edit fa-fw"></i></a></td>
                                            <td><a href="#"><i class="fa fa-times fa-fw"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
        <!-- /#page-wrapper -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    <div id="" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("pass/update", array('autocomplete' => 'off')); ?>
                    <div class="form-group">
                        <label>Account</label>
                        <?php 
                            $account = array(
                                'name' => 'account',
                                'id' => 'account',
                                'type' => 'text',
                                'class' => 'form-control',
                                'autofocus' => 'autofocus',
                                'required' => 'required',
                                'value' => '',
                            );
                        ?>
                        <?php echo form_input($account);?>
                        <p class="help-block">Example: FB, Instagram, Twitter</p>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <?php 
                            $username = array(
                                'name' => 'username',
                                'id' => 'username',
                                'type' => 'text',
                                'class' => 'form-control',
                                'required' => 'required',
                                'value' => '',
                            );
                        ?>
                        <?php echo form_input($username);?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <?php 
                            $email = array(
                                'name' => 'email',
                                'id' => 'email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'value' => '@gmail.com',
                            );
                        ?>
                        <?php echo form_input($email);?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <?php 
                            $password = array(
                                'name' => 'password',
                                'id' => 'password',
                                'type' => 'password',
                                'class' => 'form-control',
                                'required' => 'required',
                                'value' => '',
                            );
                        ?>
                        <?php echo form_input($password);?>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <?php 
                            $description = array(
                                'name' => 'description',
                                'id' => 'description',
                                'rows' => '3',
                                'class' => 'form-control',
                                'value' => '',
                            );
                        ?>
                        <?php echo form_textarea($description);?>
                    </div>

                    <div class="form-group">
                        <?php echo form_submit('submit', 'Save', array('class' => 'btn btn-lg btn-success btn-block'));?>
                    </div>
                    <?php echo form_close();?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('pass/footer');?>
   

