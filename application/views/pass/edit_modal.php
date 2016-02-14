<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Account</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-7">
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
                            <?php echo form_input($username); ?>
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
                        <?php 
                        $data = array(
                            'name'        => 'newsletter',
                            'id'          => 'newsletter',
                            'value'       => 'accept',
                            'checked'     => TRUE,
                            'style'       => 'margin:10px',
                            );

                        echo form_checkbox($data);
                        ?>
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