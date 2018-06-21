<?php

  // Use this template to render out any SEO critical content needed before Vue is initiated

?>
<div class="rendered-content">

  <?php

    if (have_posts()) {
      while (have_posts()) {
        the_post();
        echo "<h1>".get_the_title()."</h1>";
        the_content(); 
      }
    }

  ?>

</div>