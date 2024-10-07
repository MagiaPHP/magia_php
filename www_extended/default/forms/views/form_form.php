<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">


    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <select name="methode">

        </select>
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