

<hr>
<object 
    data="index.php?c=expenses&a=export_pdf&id=<?php echo $id; ?>&lang=en_GB" 
    type="application/pdf" 
    width="100%" 
    height="1000px">
    <p>Unable to display PDF file. <a href="pdf.pdf">Download</a> instead.</p>
</object>



<?php
/**
 * 

  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active">
  <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php _t("Details"); ?></a>
  </li>

  <li role="presentation">
  <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
  <?php _t("Others docs"); ?>
  </a>
  </li>

  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">

  <nav aria-label="Page navigation">
  <ul class="pagination">
  <li>
  <a href="#" aria-label="Previous">
  <span aria-hidden="true">&laquo;</span>
  </a>
  </li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li>
  <a href="#" aria-label="Next">
  <span aria-hidden="true">&raquo;</span>
  </a>
  </li>
  </ul>
  </nav>



  <object
  data="index.php?c=expenses&a=export_pdf&id=<?php echo $id; ?>&lang=en_GB"
  type="application/pdf"
  width="100%"
  height="1000px">
  <p>Unable to display PDF file. <a href="pdf.pdf">Download</a> instead.</p>
  </object>




  </div>
  <div role="tabpanel" class="tab-pane" id="profile">...</div>
  <div role="tabpanel" class="tab-pane" id="messages">

  <h2>Files</h2>
  <form>
  <div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
  <label for="exampleInputFile">File input</label>
  <input type="file" id="exampleInputFile">
  <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
  <label>
  <input type="checkbox"> Check me out
  </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>




  </div>
  <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

  </div>



 */
?>