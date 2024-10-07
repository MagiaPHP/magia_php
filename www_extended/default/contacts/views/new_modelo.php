
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-6"><hr></div>
        <div class="col-md-6"><hr></div>
    </div>
</div>

























<div class="page-header">
    <h1><?php echo $company->getName(); ?> <small><?php echo $company->getTva(); ?></small></h1>
    <p>23. Av de la calle 1082 Berchem st Agathe <b>Tel:</b> 621951</p>
</div>

<form>
    <div class="row">

        <?php
//        vardump(count(employees_list_by_company($company->getId())));

        foreach (employees_list_by_company($company->getId()) as $key => $employe) {
            echo '<div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="www/gallery/img/contact.jpg" alt="" class="img img-responsive"/>

                <div class="caption">
                    <h3>' . contacts_formated($employe['contact_id']) . '</h3>
                    <p>' . $employe['cargo'] . '</p>
                    <p>Tel: +32474624707</p>
                    <p>Email: robin@coello.be</p>
                    <p>
                        <a href="#" class="btn btn-primary" role="button">Button</a> 
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>
        ';
        }
        ?>









        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="www/gallery/img/contact.jpg" alt="" class="img img-responsive"/>
                <div class="caption">
                    <h3>Add new </h3>
                    <p>Gerente</p>
                    <p>
                        <a href="#" class="btn btn-primary" role="button">Button</a> 
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>
    </div>






    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">                
                <div class="col-xs-4">
                    <label for="exampleInputEmail1">Direcciones</label>
                    <input type="text" class="form-control" placeholder=".col-xs-3">
                </div>

                <div class="col-xs-4">
                    <label for="exampleInputEmail1">.</label>
                    <input type="text" class="form-control" placeholder=".col-xs-4">
                </div>


                <div class="col-xs-4">
                    <label for="exampleInputEmail1">.</label>
                    <input type="text" class="form-control" placeholder=".col-xs-4">
                </div>                
            </div>




        </div>
    </div>







    <br>
    <br>
    <br>
    <br>



    <button type="submit" class="btn btn-default">Submit</button>
</form>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
