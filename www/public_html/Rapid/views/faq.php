<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>
                <?php _t("Frequent questions"); ?>
            </h3>
            <p>
                <?php
                _t("If you don't find an appropriate answer, you can enter our blog.");
                ?>
            </p>
        </header>

        <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">

            <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                    <?php _t("Can I go from free to paid plan?"); ?> 
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php _t("Yes, at any time you can change from one plan to another without additional payment"); ?>
                    </p>
                </div>
            </li>

            <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
                    <?php _t("Can you help me create my logo?"); ?> 
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php
                        _t("Yes, we can also help you with that, it has a symbolic cost");
                        ?> 
                    </p>
                </div>
            </li>

            <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                    <?php
                    _t("I already have another system, can you help me with the transition to factuz?");
                    ?>
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php _t("Yes, that is a not very complicated task to carry out as long as the system you are currently using allows it, contact us to find out if it is possible"); ?>
                    </p>
                </div>
            </li>

            <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
                    <?php
                    _t("I don't know how to use the system, can you give me training?")
                    ?> 
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php
                        _t("Yes, of course, you can see that the system is intuitive, it will take you very little time to get used to it");
                        ?>
                    </p>
                </div>
            </li>

            <li>
                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">

                    <?php _t("What language is factuz in?"); ?>

                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php _t("Factuz is multi-language, you can currently use it in"); ?>: 
                        <?php
                        foreach (_languages_list_by_status(1) as $key => $lan) {
                            echo _tr($lan['name']) . ", ";
                        }
                        ?>
                    </p>
                </div>
            </li>

            <li>
                <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
                    <?php
                    echo _t("Can I use factuz for a company outside Belgium?")
                    ?> 
                    <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        <?php _t('Yes, of course there is no problem'); ?>
                    </p>
                </div>
            </li>

        </ul>

    </div>
</section>
