
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Invoices</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Budgets</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Credit notes</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">My company</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <h3><?php _t("Invoices"); ?></h3>
            <table class="table table-condensed bordered">
                <?php
                foreach (doc_tags_search_by('controller', 'invoices') as $key => $tag) {
                    echo '<tr><td><b>%' . $tag['tag'] . '%</b></td><td>' . $tag["description"] . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <h3><?php _t("Budgets"); ?></h3>
            <table class="table table-condensed bordered">
                <?php
                foreach (doc_tags_search_by('controller', 'budgets') as $key => $tag) {
                    echo '<tr><td><b>%' . $tag['tag'] . '%</b></td><td>' . $tag["description"] . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="messages">

            <h3><?php _t("Credit notes"); ?></h3>
            <table class="table table-condensed bordered">
                <?php
                foreach (doc_tags_search_by('controller', 'credit_notes') as $key => $tag) {
                    echo '<tr><td><b>%' . $tag['tag'] . '%</b></td><td>' . $tag["description"] . '</td></tr>';
                }
                ?>
            </table>

        </div>
        <div role="tabpanel" class="tab-pane" id="settings">

            <h3><?php _t("My company"); ?></h3>
            <table class="table table-condensed bordered">
                <?php
                foreach (doc_tags_search_by('controller', 'companies') as $key => $tag) {
                    echo '<tr><td><b>%' . $tag['tag'] . '%</b></td><td>' . $tag["description"] . '</td></tr>';
                }
                ?>
            </table>

        </div>
    </div>

</div>
