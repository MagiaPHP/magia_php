<?php // echo vardump($doc_models);       ?>

<p><b><?php _t("Name"); ?>: </b> <?php echo $doc_models->getName(); ?></p>
<p><b><?php _t("Description"); ?>: </b><?php echo $doc_models->getDescription(); ?></p>
<p><b><?php _t("Author"); ?>: </b> <a target="new" href="<?php echo $doc_models->getUrl(); ?>"><?php echo $doc_models->getAuthor(); ?></a></p>
