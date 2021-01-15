<?php
/**
 * Control the templating system
 *
 * VFM - Virtue-One File Manager Administration
 *
 * PHP version >= 7.3
 * 
 * @author    Sylvester Umole <sylvester@symoletech.com.ng>
 *
 */
if (!class_exists('Template', false)) {
    /**
     * Template class
     *
     * 
     */
    class Template
    {
        /**
         * Check if all the parts exist
         *
         * @param string $file     - the template part to search
         * @param string $relative - the relative path
         *
         * @return include file
         */
        public function getPart($file, $relative = 'vfm-admin/')
        {
            global
            $_IMAGES,
            $_USERS,
            $newusers,
            $downloader,
            $gateKeeper,
            $getdownloadlist,
            $location,
            $resetter,
            $getrp,
            $setUp,
            $updater,
            $vfm_version;

            if (file_exists($relative.'_content/template/'.$file.'.php')) {
                $thefile = $relative.'_content/template/'.$file.'.php';
            } else {
                $thefile =  $relative.'include/'.$file.'.php';
            }
            include $thefile;
        }
    }
}
