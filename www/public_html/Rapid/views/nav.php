<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>


        <?php
        /**
         *   <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>

          <li><a class = "nav-link scrollto" href = "#team">Team</a></li>
          <li class = "dropdown"><a href = "#"><span>Drop Down</span> <i class = "bi bi-chevron-down"></i></a>
          <ul>
          <li><a href = "#">Drop Down 1</a></li>
          <li class = "dropdown"><a href = "#"><span>Deep Drop Down</span> <i class = "bi bi-chevron-right"></i></a>
          <ul>
          <li><a href = "#">Deep Drop Down 1</a></li>
          <li><a href = "#">Deep Drop Down 2</a></li>
          <li><a href = "#">Deep Drop Down 3</a></li>
          <li><a href = "#">Deep Drop Down 4</a></li>
          <li><a href = "#">Deep Drop Down 5</a></li>
          </ul>
          </li>
          <li><a href = "#">Drop Down 2</a></li>
          <li><a href = "#">Drop Down 3</a></li>
          <li><a href = "#">Drop Down 4</a></li>
          </ul>
          </li>
         */
        ?>

        <?php
        /**
         *         <li><a class="nav-link scrollto" href="#registrarse"><?php _t("New account"); ?></a></li>

         */
        ?>
        <?php if (modules_field_module('status', 'shop')) { ?>                    
            <li><a class="nav-link scrollto" href="index.php?c=home&a=new_account"><?php _t("New account"); ?></a></li>
        <?php } ?>

        <li><a class="nav-link scrollto" href="#login"><?php _t("Login"); ?></a></li>

    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>