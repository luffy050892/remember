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
                                            <td id="account<?php echo $account->id; ?>"><?php echo $account->account; ?></td>
                                            <td id="username<?php echo $account->id; ?>"><?php echo $account->username; ?></td>
                                            <td id="email<?php echo $account->id; ?>"><?php echo $account->email; ?></td>
                                            <td><?php echo $account->date_added; ?></td>
                                            <td id="modified<?php echo $account->id; ?>"><?php echo $account->last_modified; ?></td>
                                            <td><button type="button" class="btn btn-primary btn-xs showPass" restie= "<?php echo $account->id; ?>">Show Password</button></td>
                                            <td><a href="#" class="edit-modal" restie="<?php echo $account->id; ?>"><i class="fa fa-edit fa-fw"></i></a></td>
                                            <td><a href="#"><i class="fa fa-times fa-fw"></i></a></td>
                                        </tr>
                                        <?php 
                                            $description2 = array(
                                                'name' => 'description',
                                                'id' => 'description'.$account->id,
                                                'rows' => '3',
                                                'style' => 'display:none',
                                                'class' => 'form-control',
                                                'value' => $account->description,
                                            );
                                        ?>
                                        <?php echo form_textarea($description2);?>
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
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Update Account</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open("pass/edit", array('autocomplete' => 'off', 'id' => 'editForm')); ?>
                    <?php 
                    $account_id = array(
                              'account_id'  => '',
                            );
                    echo form_hidden($account_id);
                    ?>
                    <div class="form-group">
                        <label>Account</label>
                        <?php 
                            $account = array(
                                'name' => 'account',
                                'id' => 'edit_account',
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
                                'id' => 'edit_username',
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
                                'id' => 'edit_email',
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
                                'id' => 'edit_password',
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
                                'id' => 'edit_description',
                                'rows' => '3',
                                'class' => 'form-control',
                                'value' => '',
                            );
                        ?>
                        <?php echo form_textarea($description);?>
                    </div>
                </div>

                <div class="modal-footer">
                    <?php echo form_submit('submit', 'Save', array('class' => 'btn btn-primary'));?>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>

<?php $this->load->view('pass/footer');?>
