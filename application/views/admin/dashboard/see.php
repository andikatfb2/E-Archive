

              <?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>
                <?php 
                 foreach ($tm_file_uploads as $key => $value) {
                echo $value->file_path;
              } ?>
                <section class="content">
                    
                </section>
            </div>
