 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->copiedSuccess
    <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

    <script>
        $("#generatePass").click(function () {
            $.post( 
                  "random_str",
              { name: "Zara" },
              function(data) {
                $("#generatedPass").html(data);
                //$('#stage').html(data);
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