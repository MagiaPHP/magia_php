
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <?php
        /**
         *  <!-- Text Logo - Use this if you don't have a graphic logo -->
          <!-- <a class="navbar-brand logo-text page-scroll" href="index.php">Tivo</a> -->
         */
        ?>


        <a class="navbar-brand logo-image" href="index.php">
            <img src="images/logo.svg" alt="alternative">
        </a>

        <?php /* <!-- Mobile Menu Toggle Button --> */ ?>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#header">
                        <?php echo strtoupper(_tr("Home")); ?>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#features">
                        <?php echo strtoupper(_tr("Features")); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link page-scroll"
                        href="index.php#details">
                            <?php echo strtoupper(_tr("Details")); ?>
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle page-scroll"
                        href="index.php#video"
                        id="navbarDropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false">
                            <?php echo strtoupper(_tr("Video")); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="article-details.php">
                            <span class="item-text">
                                <?php echo strtoupper(_tr("Article details")); ?>
                            </span>
                        </a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="terms-conditions.php">
                            <span class="item-text">
                                <?php echo strtoupper(_tr("Terms conditions")); ?>
                            </span>
                        </a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.php">
                            <span class="item-text">
                                <?php echo strtoupper(_tr("Privacy policy")); ?>
                            </span>
                        </a>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#pricing">
                        <?php echo strtoupper(_tr("Pricing")); ?>
                    </a>
                </li>
            </ul>
            <span class="nav-item">
                <a class="btn-outline-sm" href="log-in.php">
                    <?php echo strtoupper(_tr("Log in")); ?>

                </a>
            </span>
        </div>
    </div>
</nav>
<?php // END NAV ?>

