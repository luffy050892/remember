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
<?php $this->load->view('pass/footer');?>
   

