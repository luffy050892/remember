
<?php $this->load->view('pass/header');?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Account</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Generate your own password
                    </div>
                    <div class="panel-body">
                	
	                    <div class="row">
	                        <div class="col-lg-6">
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

                                <div class="form-group">
                                    <?php echo form_submit('submit', 'Save', array('class' => 'btn btn-lg btn-success btn-block'));?>
                                </div>
                                <?php echo form_close();?>
	                        </div>

                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <button id="generatePass" type="button" class="btn btn-outline btn-success btn-lg btn-block">Generate Password</button>
                                    </div>
                                    <div class="panel-body" style="height:100px; text-align:center">
                                        <h3 id="generatedPass"></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <button id="copyButton" type="button" class="btn btn-outline btn-info btn-lg btn-block">Copy Password</button>
                                    </div>
                                </div>

                                <div id="copiedSuccess" style="display:none">
                                    
                                </div>
                            </div>
	                    </div>
                    </div>
                    
                </div>
                    <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('pass/footer');?>
