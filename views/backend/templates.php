<?php

if (isset($opt)) {
    switch ($opt) {
        case 'main':

            echo $this->render('_main_site');

            break;

        case 'units':

            echo $this->render('_units');

            break;

        case 'page':

            echo $this->render('_custom_page');

            break;
    }
}
?>