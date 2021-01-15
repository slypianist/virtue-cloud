<?php
/**
 * VFM - virtue file manager: admin-panel/view/admin-head-apperarance.php
 * main appearance setting process
 *
 * PHP version >= 7. 3
 *
 * @category  PHP
 * @package   Virtue File Manager
 * @author    Sylvester Umole
 * 
 */

if ($get_action == 'update') {
    $postnewlang = filter_input(INPUT_POST, "thenewlang", FILTER_SANITIZE_STRING);
    $getremove = filter_input(INPUT_GET, "remove", FILTER_SANITIZE_STRING);

    if ($postnewlang || $getremove) {

        if ($getremove) {

            $thelang = $getremove;
            $langtoremove = "translations/".$thelang.".php";

            if (!file_exists($langtoremove) || !unlink($langtoremove)) {
                Utils::setError('language "'.$thelang.'" does not exist');
            } else {
                Utils::setSuccess($setUp->getString("language_removed"));
            }

        } else {

            $thelang = $postnewlang;

            if (array_key_exists($thelang, $translations)) {
                foreach ($baselang as $key => $value) {

                    $postkey = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        
                    $_TRANSLATIONSEDIT[$key] = $postkey;
                }
                Utils::setSuccess($setUp->getString("language_updated"));
            } else {
                $newlang = array();
                foreach ($baselang as $key => $value) {

                    $postkey = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
                    $newlang[$key] = $postkey;
                }
                $_TRANSLATIONSEDIT = array_merge($_TRANSLATIONSEDIT, $newlang);
                Utils::setSuccess($setUp->getString("language_added"));
            }

            $langname = $_TRANSLATIONSEDIT['LANGUAGE_NAME'];
            $translations_index[$thelang] = $langname;

            file_put_contents($jsonindex, json_encode($translations_index, JSON_FORCE_OBJECT));

            $trans = '$_TRANSLATIONS = ';
            if (false == (file_put_contents(
                'translations/'.$thelang.'.php',
                "<?php\n\n $trans".var_export($_TRANSLATIONSEDIT, true).";\n"
            ))
            ) {
                Utils::setError('Error updating language file');
            }
        }
    }
}