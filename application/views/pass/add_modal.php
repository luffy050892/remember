<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Account</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-7">
                        <?php echo form_open("pass/add", array('autocomplete' => 'off')); ?>
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
                    </div>
                    <div class="col-lg-4">
                        <?php $this->load->view('pass/gen_password');?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-7">
                        <?php echo form_submit('submit', 'Save', array('class' => 'btn btn-primary'));?>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>