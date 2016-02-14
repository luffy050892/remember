<?php $this->load->view('pass/header');?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Accounts</h1>
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
                        <div class="dataTable_wrapper">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button id="add-modal" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw"></i> Add Account</button>
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-primary btn-xs" id = "showDates">Toggle Dates</button>
                                </div>
                            </div>

                            <br/>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
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
                                        <tr class="odd gradeX" id="form_<?php echo $account->id; ?>">
                                            <td id="account<?php echo $account->id; ?>"><?php echo $account->account; ?></td>
                                            <td id="username<?php echo $account->id; ?>"><?php echo $account->username; ?></td>
                                            <td id="email<?php echo $account->id; ?>"><?php echo $account->email; ?></td>
                                            <td><?php echo $account->date_added; ?></td>
                                            <td id="modified<?php echo $account->id; ?>"><?php echo $account->last_modified; ?></td>
                                            <td><button type="button" class="btn btn-primary btn-xs showPass" restie= "<?php echo $account->id; ?>">Show Password</button></td>
                                            <td><a href="#" class="edit-modal" restie="<?php echo $account->id; ?>"><i class="fa fa-edit fa-fw"></i></a></td>
                                            <td><a href="#" class="delete-modal" restie="<?php echo $account->id; ?>"><i class="fa fa-times fa-fw"></i></a></td>
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
    <?php $this->load->view('pass/add_modal');?>
    <?php $this->load->view('pass/edit_modal');?>
    <?php $this->load->view('pass/delete_modal');?>

<?php $this->load->view('pass/footer');?>
