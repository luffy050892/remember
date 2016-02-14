<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <?php 
                $account_id = array(
                          'delete_id'  => '',
                        );
                echo form_hidden($account_id);
                ?>
                <p>Do you really want to delete this account?</p>
                <p class="text-warning"><small>Changes to this account will be permanent.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="deleteThis" type="button" class="btn btn-danger">Confirm Delete</button>
            </div>
        </div>
    </div>
</div>