<div class="mkd-tabs-content">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="import">
            <div class="mkd-tab-content">
                <div class="mkd-page-title-holder clearfix">
                    <h2 class="mkd-page-title"><?php esc_html_e( 'Import', 'affinity' ); ?></h2>
                </div>
                <form method="post" class="mkd_ajax_form mkd-import-page-holder">
                    <div class="mkd-page-form">
                        <div class="mkd-page-form-section-holder">
                            <h3 class="mkd-page-section-title"><?php esc_html_e( 'Import Demo Content', 'affinity' ); ?></h3>
                            <div class="mkd-page-form-section">
                                <div class="mkd-field-desc">
                                    <h4><?php esc_html_e( 'Import', 'affinity' ); ?></h4>

                                    <p><?php esc_html_e( 'Choose demo content you want to import', 'affinity' ); ?></p>
                                </div>
                                <!-- close div.mkd-field-desc -->

                                <div class="mkd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_example" id="import_example" class="form-control mkd-form-element dependence">
                                                    <option value="affinity"><?php esc_html_e( 'Affinity', 'affinity' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.mkd-section-content -->

                            </div>

                            <div class="mkd-page-form-section">


                                <div class="mkd-field-desc">
                                    <h4><?php esc_html_e( 'Import Type', 'affinity' ); ?></h4>

                                    <p><?php esc_html_e( 'Enabling this option will switch to a Side Position (default is Top Position)', 'affinity' ); ?></p>
                                </div>
                                <!-- close div.mkd-field-desc -->



                                <div class="mkd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_option" id="import_option" class="form-control mkd-form-element">
                                                    <option value=""><?php esc_html_e( 'Please Select', 'affinity' ); ?></option>
                                                    <option value="complete_content"><?php esc_html_e( 'All', 'affinity' ); ?></option>
                                                    <option value="content"><?php esc_html_e( 'Content', 'affinity' ); ?></option>
                                                    <option value="widgets"><?php esc_html_e( 'Widgets', 'affinity' ); ?></option>
                                                    <option value="options"><?php esc_html_e( 'Options', 'affinity' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.mkd-section-content -->

                            </div>
                            <div class="mkd-page-form-section">


                                <div class="mkd-field-desc">
                                    <h4><?php esc_html_e( 'Import attachments', 'affinity' ); ?></h4>

                                    <p>Do you want to import media files?</p>
                                </div>
                                <!-- close div.mkd-field-desc -->
                                <div class="mkd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="field switch">
                                                    <label class="cb-enable dependence"><span><?php esc_html_e( 'Yes', 'affinity' ); ?></span></label>
                                                    <label class="cb-disable selected dependence"><span><?php esc_html_e( 'No', 'affinity' ); ?></span></label>
                                                    <input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.mkd-section-content -->
                            </div>
                            <div class="mkd-page-form-section">


                                <div class="mkd-field-desc">
                                    <input type="submit" class="btn btn-primary btn-sm " value="<?php esc_attr_e('Import', 'affinity'); ?>" name="import" id="import_demo_data" />
                                </div>
                                <!-- close div.mkd-field-desc -->
                                <div class="mkd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="import_load"><span><?php esc_html_e('The import process may take some time. Please be patient.', 'affinity') ?> </span><br />
                                                    <div class="mkd-progress-bar-wrapper html5-progress-bar">
                                                        <div class="progress-bar-wrapper">
                                                            <progress id="progressbar" value="0" max="100"></progress>
                                                        </div>
                                                        <div class="progress-value"><?php esc_attr_e( '0%', 'affinity' ); ?></div>
                                                        <div class="progress-bar-message">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.mkd-section-content -->
                            </div>
                            <div class="mkd-page-form-section mkd-import-button-wrapper">

                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'affinity') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'affinity'); ?></li>
                                        <li> <?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'affinity')?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div><!-- close mkd-tab-content -->
        </div>
    </div>
</div> <!-- close div.mkd-tabs-content -->

<script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            $(document).on('click', '#import_demo_data', function(e) {
                e.preventDefault();
                if (confirm('Are you sure, you want to import Demo Data now?')) {
                    $('.import_load').css('display','block');
                    var progressbar = $('#progressbar');
                    var import_opt = $( "#import_option" ).val();
                    var import_expl = $( "#import_example" ).val();
                    var p = 0;
                    if(import_opt == 'content'){
                        for(var i=1;i<10;i++){
                            var str;
                            if (i < 10) str = 'affinity_content_0'+i+'.xml';
                            else str = 'affinity_content_'+i+'.xml';
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'mkd_dataImport',
                                    xml: str,
                                    example: import_expl,
                                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                },
                                success: function(data, textStatus, XMLHttpRequest){
                                    p+= 10;
                                    $('.progress-value').html((p) + '%');
                                    progressbar.val(p);
                                    if (p == 90) {
                                        str = 'affinity_content_10.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'mkd_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function(data, textStatus, XMLHttpRequest){
                                                p+= 10;
                                                $('.progress-value').html((p) + '%');
                                                progressbar.val(p);
                                                $('.progress-bar-message').html('<div class="alert alert-success"><strong><?php esc_html_e( 'Import is completed', 'affinity' ); ?></strong></div>');
                                            },
                                            error: function(MLHttpRequest, textStatus, errorThrown){
                                            }
                                        });
                                    }
                                },
                                error: function(MLHttpRequest, textStatus, errorThrown){
                                }
                            });
                        }
                    } else if(import_opt == 'widgets') {
                        jQuery.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {
                                action: 'mkd_widgetsImport',
                                example: import_expl
                            },
                            success: function(data, textStatus, XMLHttpRequest){
                                $('.progress-value').html((100) + '%');
                                progressbar.val(100);
                            },
                            error: function(MLHttpRequest, textStatus, errorThrown){
                            }
                        });
                        $('.progress-bar-message').html('<div class="alert alert-success"><strong><?php esc_html_e( 'Import is completed', 'affinity' ); ?></strong></div>');
                    } else if(import_opt == 'options'){
                        jQuery.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {
                                action: 'mkd_optionsImport',
                                example: import_expl
                            },
                            success: function(data, textStatus, XMLHttpRequest){
                                $('.progress-value').html((100) + '%');
                                progressbar.val(100);
                            },
                            error: function(MLHttpRequest, textStatus, errorThrown){
                            }
                        });
                        $('.progress-bar-message').html('<div class="alert alert-success"><strong><?php esc_html_e( 'Import is completed', 'affinity' ); ?></strong></div>');
                    }else if(import_opt == 'complete_content'){
                        for(var i=1;i<10;i++){
                            var str;
                            if (i < 10) str = 'affinity_content_0'+i+'.xml';
                            else str = 'affinity_content_'+i+'.xml';
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'mkd_dataImport',
                                    xml: str,
                                    example: import_expl,
                                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                },
                                success: function(data, textStatus, XMLHttpRequest){
                                    p+= 10;
                                    $('.progress-value').html((p) + '%');
                                    progressbar.val(p);
                                    if (p == 90) {
                                        str = 'affinity_content_10.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'mkd_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function(data, textStatus, XMLHttpRequest){
                                                jQuery.ajax({
                                                    type: 'POST',
                                                    url: ajaxurl,
                                                    data: {
                                                        action: 'mkd_otherImport',
                                                        example: import_expl
                                                    },
                                                    success: function(data, textStatus, XMLHttpRequest){
                                                        //alert(data);
                                                        $('.progress-value').html((100) + '%');
                                                        progressbar.val(100);
                                                        $('.progress-bar-message').html('<div class="alert alert-success"><?php esc_html_e( 'Import is completed.', 'affinity' ); ?></div>');
                                                    },
                                                    error: function(MLHttpRequest, textStatus, errorThrown){
                                                    }
                                                });
                                            },
                                            error: function(MLHttpRequest, textStatus, errorThrown){
                                            }
                                        });
                                    }
                                },
                                error: function(MLHttpRequest, textStatus, errorThrown){
                                }
                            });
                        }
                    }
                }
                return false;
            });
        });
    })(jQuery);

</script>