<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class KalakotraControllerExtension extends DataExtension 
{
    protected function init() {
        parent::init();

        if ($this->URLSegment != "Security") {
                $myThemes = SSViewer::get_themes();
                $myThemePath = "themes/".$myThemes[1]."/";

                Requirements::css($myThemePath.'css/scss/bootstrap.scss');

                Requirements::backend()->setWriteHeaderComment(false);
                $css = [];
                $css[] = $myThemePath.'css/all.min.css';
                
                $css[] = $myThemePath.'css/layout.css';
                $css[] = $myThemePath.'css/navigation.css';
                $css[] = $myThemePath.'css/reset.css';
                $css[] = $myThemePath.'css/fonts.css';
                $css[] = $myThemePath.'css/font-size.css';
                $css[] = $myThemePath.'css/hamburgers.min.css';

                $css[] = $myThemePath.'css/jquery.fancybox.min.css';
                $css[] = $myThemePath.'css/aos.css';
                Requirements::combine_files('styles.css', $css, ["async"=>true, "defer" => true]);
                Requirements::process_combined_files();

                $js = [];
                $js[] = $myThemePath.'javascript/jquery-3.5.1.min.js';
                Requirements::combine_files('jquery.js', $js);
                Requirements::process_combined_files();

                $js = [];
                $js[] = $myThemePath.'javascript/popper.min.js';
                $js[] = $myThemePath.'javascript/bootstrap.min.js';
                $js[] = $myThemePath.'javascript/aos.js';
                $js[] = $myThemePath.'javascript/jquery.fancybox.min.js';
                $js[] = $myThemePath.'javascript/script.js';
                Requirements::combine_files('javascripts.js', $js, ["async"=>true, "defer" => true]);
                Requirements::process_combined_files();
            }
    }
    
}
