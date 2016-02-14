 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

     <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

    <script>
        var table = $('#dataTables-example').DataTable({
                responsive: true,
                "columnDefs": [
                    {
                        "targets": [ 3 ],
                        "visible": false,
                    },
                    {
                        "targets": [ 4 ],
                        "visible": false
                    }
                ]
        });

        $('#showDates').on( 'click', function (e) {
            e.preventDefault();
     
            // Get the column API object
            var column = table.column(3);
     
            // Toggle the visibility
            column.visible( ! column.visible() );

            var column = table.column(4);
     
            // Toggle the visibility
            column.visible( ! column.visible() );
        });

        $("#add-modal").click(function() {
            $("#addModal").modal({
            });
        });
        
        $(".edit-modal").click(function() {
            var account_id = $(this).attr('restie');
            $("input[name=account_id]").val(account_id);
            $("#edit_account").val($("#account"+account_id).html());
            $("#edit_username").val($("#username"+account_id).html());
            $("#edit_email").val($("#email"+account_id).html());
            $("#edit_description").val($("#description"+account_id).html());
            $("#editModal").modal({
            });
        }); 
        
        $(".delete-modal").click(function() {
            var account_id = $(this).attr('restie');
            $("input[name=delete_id]").val(account_id);
            $("#deleteModal").modal({
            });
        });

        $("#deleteThis").click(function() {
            var restie = $(this);
            var account_id = $("input[name=delete_id]").val();

            $.post(
                  "pass/delete",
              { id: $("input[name=delete_id]").val() },
              function(data) {
                    $("#form_"+account_id).remove();
                    $("#deleteModal").modal('hide');
              }
            );

            event.preventDefault();
        });

        $( "#editForm" ).submit(function( event ) {

            var restie = $(this);
            var account_id = $("input[name=account_id]").val();

            $.ajax({
                type : 'POST',
                url : 'pass/edit',
                data : $(this).serialize(),
                success:function(data) {
                    $("#account"+account_id).html($("#edit_account").val());
                    $("#username"+account_id).html($("#edit_username").val());
                    $("#email"+account_id).html($("#edit_email").val());
                    $("#editModal").modal('hide');
                }
            });

            event.preventDefault();
        });

        $(".showPass").click(function () {
            var restie = $(this);
            $.post( 
                  "pass/getPassword",
              { id: $(this).attr('restie') },
              function(data) {
                restie.parent().html(data);
                //$('#stage').html(data);
              }
           );
        });

        $("#generatePass").click(function () {
            $.post( 
                  "pass/random_str",
              { name: "Zara" },
              function(data) {
                $("#generatedPass").html(data);
              }
           );
        });

        document.getElementById("copyButton").addEventListener("click", function() {
            if(copyToClipboard(document.getElementById("generatedPass")) == false) {
                $("#copiedSuccess").fadeTo(2000, 500).slideUp(500, function(){
                    $("#copiedSuccess").hide();
                }).html("<strong>Failed!</strong> Password failed to copy. Please try again").attr('class', 'alert alert-danger fade in');
            } else {
                $("#copiedSuccess").fadeTo(2000, 500).slideUp(500, function(){
                    $("#copiedSuccess").hide();
                }).html("<strong>Success!</strong> Password successfully copied to clipboard").attr('class', 'alert alert-success fade in');
            }
        });

        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.setSelectionRange(0, target.value.length);
            
            // copy the selection
            var succeed;
            try {
                  succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            return succeed;
        }
        
    </script>

</body>

</html>