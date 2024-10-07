<section id="pricing" class="pricing section-bg wow fadeInUp">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3><?php _t("Price"); ?></h3>
            <p>
                <?php _t("The most visited section :)"); ?>
            </p>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">


            <?php foreach (subdomains_plan_list() as $key => $spl) { ?>
                <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-header">
                            <h3><?php echo moneda($spl["price"]); ?><span class="currency">€</span><span class="period">/<?php echo _t("month"); ?></span></h3>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">
                                <?php echo $spl["plan"]; ?>
                            </h4>
                            <ul class="list-group">

                                <?php
//                                foreach (subdomains_features_list() as $key => $sfl) {
//                                    echo '<tr><td>' . $sfl["feature"] . '</td>';
//                                    foreach (subdomains_plan_list() as $key => $spltable) {
//                                        echo '<td class="text-center">';
//                                        echo (subdomains_plan_features_search_by_plan_feature($spltable['plan'], $sfl['feature'])) ?
//                                                '<span class="glyphicon glyphicon-ok"></span>' :
//                                                '<span class="glyphicon glyphicon-remove"></span>';
//                                        echo '</td>';
//                                    }
//                                    echo '</tr>';
//                                }
                                ?>



                                <?php
                                foreach (subdomains_features_list() as $key => $sfl) {

                                    echo '<li class="list-group-item">';

//                                    vardump((subdomains_plan_features_search_by_plan_feature($spl['plan'], $sfl['feature'])));

                                    $icon = (subdomains_plan_features_search_by_plan_feature($spl['plan'], $sfl['feature']) ) ?
                                            '<span class="glyphicon glyphicon-ok"></span><i class="bi bi-check2-square"></i>' :
                                            '<span class="glyphicon glyphicon-remove"></span>';

                                    echo '' . $icon . ' ' . $sfl["feature"] . "</li>";
                                }
                                ?>
                                <?php
                                /**
                                 * <li class="list-group-item">Documentos ilimitados</li>
                                  <li class="list-group-item">Todas las funciones activadas</li>
                                  <li class="list-group-item">Solo para empresas nuevas </li>
                                  <li class="list-group-item">Ilimitadas actualizaciones</li>
                                  <li class="list-group-item">24/7 Soporte</li>
                                  <li class="list-group-item">0 pagos</li>

                                 */
                                ?>

                            </ul>
                            <a href="mailto:info@factuz.be?subject=Nueva cuenta&body=hola deseo una nueva cuenta gratis" class="btn">
                                <?php _t("Select this plan"); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>


            <?php
            /**
             *             <?php // FREE  ?>
              <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
              <div class="card-header">
              <h3>0.00<span class="currency">€</span><span class="period">/mes</span></h3>
              </div>
              <div class="card-block">
              <h4 class="card-title">
              Free Plan
              </h4>
              <ul class="list-group">
              <li class="list-group-item">Documentos ilimitados</li>
              <li class="list-group-item">Todas las funciones activadas</li>
              <li class="list-group-item">Solo para empresas nuevas </li>
              <li class="list-group-item">Ilimitadas actualizaciones</li>
              <li class="list-group-item">24/7 Soporte</li>
              <li class="list-group-item">0 pagos</li>
              </ul>
              <a href="mailto:info@factuz.be?subject=Nueva cuenta&body=hola deseo una nueva cuenta gratis" class="btn">Escoje Este Plan</a>
              </div>
              </div>
              </div>

              <!-- Regular Plan  -->
              <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="card">
              <div class="card-header">
              <h3>29<span class="currency">€</span><span class="period">/mes</span></h3>
              </div>
              <div class="card-block">
              <h4 class="card-title">
              Regular Plan
              </h4>
              <ul class="list-group">
              <li class="list-group-item">Documentos ilimitados</li>
              <li class="list-group-item">Todas las funciones activadas</li>
              <li class="list-group-item">Modulos inteligentes</li>
              <li class="list-group-item">Frecuentes actualizaciones</li>
              <li class="list-group-item">24/7 Soporte</li>
              <li class="list-group-item">Pago anual</li>
              </ul>
              <a href="mailto:info@factuz.be?subject=Nueva cuenta&body=hola deseo una nueva cuenta Regular" class="btn">Escoje Este Plan</a>
              </div>
              </div>
              </div>

              <!-- Premium Plan  -->
              <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
              <div class="card">
              <div class="card-header">
              <h3>39<span class="currency">€</span><span class="period">/mes</span></h3>
              </div>
              <div class="card-block">
              <h4 class="card-title">
              Premium Plan
              </h4>
              <ul class="list-group">
              <li class="list-group-item">Documentos ilimitados</li>
              <li class="list-group-item">Todas las funciones activadas</li>
              <li class="list-group-item">Modulos inteligentes</li>
              <li class="list-group-item">Prioridad en actualizaciones</li>
              <li class="list-group-item">24/7 Soporte</li>
              <li class="list-group-item">Pago trimestral</li>
              </ul>
              <a href="mailto:info@factuz.be?subject=Nueva cuenta&body=hola deseo una nueva cuenta Premium" class="btn">Escoje Este Plan</a>
              </div>
              </div>
              </div>

             */
            ?>
        </div>
    </div>

</section>
