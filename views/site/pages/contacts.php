
<section id="contact-us" class="page-section">
    <div class="container">
        <?php
        if (isset($contacts_main) && $contacts_main) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['Directions_to_Main_Campus']['sw'] : Yii::$app->params['static_items']['Directions_to_Main_Campus']['en'] ?></h3>
                    <p><?php
                        if ($contacts_main->Descriptions) {
                            echo $contacts_main->Descriptions;
                        }
                        ?></p>
                </div>

            </div>
            <?php
        }
        ?>

        <hr>
        <div class="row">
            <div class="col-md-4">							
                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['Contact_us_form']['sw'] : Yii::$app->params['static_items']['Contact_us_form']['en'] ?></h3>
                <p class="form-message" style="display: none;"></p>
                <div class="contact-form">
                    <!-- Form Begins -->
                    <form role="form" name="contactform" id="contactform" method="POST" action="#">
                        <!-- Field 1 -->
                        <div class="input-text form-group">
                            <input type="text" name="contact_name" class="input-name form-control" placeholder="Full Name" />
                        </div>
                        <!-- Field 2 -->
                        <div class="input-email form-group">
                            <input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
                        </div>
                        <!-- Field 3 -->
                        <div class="input-email form-group">
                            <input type="text" name="contact_phone" class="input-phone form-control" placeholder="Phone"/>
                        </div>
                        <!-- Field 4 -->
                        <div class="textarea-message form-group">
                            <textarea name="contact_message" class="textarea-message form-control" placeholder="Message" rows="2" ></textarea>
                        </div>
                        <!-- Button -->
                        <button class="btn btn-default btn-block" type="submit">Send Now <i class="fa fa-envelope"></i></button>

                    </form>
                    <!-- Form Ends -->
                </div>
            </div>

            <div class="col-md-8">
                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['Main_campus_location']['sw'] : Yii::$app->params['static_items']['Main_campus_location']['en'] ?></h3>
                <div class="map-section">
                    <?php
                    if ($contacts_main->GoogleMapCode) {
                        echo $contacts_main->GoogleMapCode;
                    }
                    ?>
                </div>
            </div><!-- map -->
        </div>

        <hr>


        <?php
        if (isset($contacts_others) && $contacts_others) {
            ?>
            <div class="row">

                <div class="col-md-12">
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['Other_campus_institutions_etc'][Yii::$app->language]; ?></h3>
                </div>
                <?php
                foreach ($contacts_others as $contact) {
                    ?>
                    <div class="col-sm-6 col-md-4 address-list" style="height: 160px;">
                        <h6 class="title">
                            <strong><?php echo (Yii::$app->language == 'sw') ? $contact->ContactTitleSw : $contact->ContactTitle; ?></strong>
                        </h6>
                        <?php if ($contact->PoBox) { ?>
                            <div><?php echo ((Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['PObox']['sw'] : Yii::$app->params['static_items']['PObox']['sw']) . ' ' . $contact->PoBox; ?></div>
                        <?php } ?>

                        <?php if ($contact->StreetRegion) { ?>
                            <div><?php echo ((Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['StreetRegion']['sw'] : Yii::$app->params['static_items']['StreetRegion']['sw']) . ' ' . $contact->StreetRegion; ?></div>
                        <?php } ?>

                        <?php if ($contact->EmailAddress) { ?>
                            <div><?php echo ((Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['EmailAddress']['sw'] : Yii::$app->params['static_items']['EmailAddress']['sw']) . ' ' . $contact->EmailAddress; ?></div>
                        <?php } ?>
                        <?php if ($contact->PhoneNo) { ?>
                            <div><?php echo ((Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['PhoneNo']['sw'] : Yii::$app->params['static_items']['PhoneNo']['sw']) . ' ' . $contact->PhoneNo; ?></div>
                        <?php } ?>
                        <?php if ($contact->FaxNo) { ?>
                            <div><?php echo ((Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['Fax']['sw'] : Yii::$app->params['static_items']['Fax']['sw']) . ' ' . $contact->FaxNo; ?></div>
                        <?php } ?>

                    </div>
                    <?php
                }
                ?>

                <!--            <div class="col-sm-6 col-md-4 address-list">
                                <h5 class="title">Central Administration</h5>
                                <div>PO Box: 35091</div>
                                <div>Phone : +255-22-2410509, +255-22-2410628</div>
                                <div>Fax : +255-22-2410023</div>
                            </div>	
                            <div class="col-sm-6 col-md-4 address-list">
                                <h5 class="title">Central Administration</h5>
                                <div>PO Box: 35091</div>
                                <div>Phone : +255-22-2410509, +255-22-2410628</div>
                                <div>Fax : +255-22-2410023</div>
                            </div>	-->

            </div>

            <hr>
        <?php } ?>

    </div>
</section><!-- page-section -->




