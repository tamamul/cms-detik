                            <div class="footer">
                                </div>
                                <div>
                                    <?php echo $this->config->item('app_name') ?>&copy; <?php   echo date('Y') ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Mainly scripts -->
                    <script src="<?php echo base_url(); ?>assets/backend-template/js/bootstrap.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/backend-template/js/plugins/metisMenu/jquery.metisMenu.js"></script>
                    <!-- Custom and plugin javascript -->
                    <script src="<?php echo base_url(); ?>assets/backend-template/js/inspinia.js"></script>
                    
                    <script src="<?php echo base_url(); ?>assets/backend-template/js/plugins/chosen/chosen.jquery.js"></script>
                    <script src="<?php echo base_url(); ?>assets/backend-template/js/plugins/summernote/summernote.min.js"></script>
                <script>
                    $(document).ready(function(){
                    $('.summernote').summernote({height:300});
                    });
                </script>                    
                <script>
                    $(document).ready(function() {
                    $('.example').select2({
                        placeholder: 'Select a month'
                    });
                    $('.chosen-select').chosen({width: "100%"});
                    });
                </script>
                <script>
                       ClassicEditor.create( document.querySelector( '#editor' ), {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                        heading: {
                            options: [
                                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                            ]
                        }
                    } )
                    .catch( error => {
                        console.log( error );
                    } );
                </script>
    </body>
</html>
                <!-- close footer -->
