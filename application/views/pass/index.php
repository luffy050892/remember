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
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><button type="button" class="btn btn-primary btn-xs">Show Password</button></td>
                                        <td><a href="#"><i class="fa fa-edit fa-fw"></i>Edit</a></td>
                                        <td><a href="#"><i class="fa fa-times fa-fw"></i>Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>Mark</td>
                                        <td><button type="button" class="btn btn-primary btn-xs">Show Password</button></td>
                                        <td><a href="#"><i class="fa fa-edit fa-fw"></i>Edit</a></td>
                                        <td><a href="#"><i class="fa fa-times fa-fw"></i>Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>Mark</td>
                                        <td><button type="button" class="btn btn-primary btn-xs">Show Password</button></td>
                                        <td><a href="#"><i class="fa fa-edit fa-fw"></i>Edit</a></td>
                                        <td><a href="#"><i class="fa fa-times fa-fw"></i>Delete</a></td>
                                    </tr>
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
   

