<?php


/**
 * translate_woo_checkout_wpml - A temporary translation fix for the WPML + WooCommerce Block Checkout (Gutenberg) plugin
 * 
 * @param string $translated - Phrase translation
 * @return mix $translated - Returns translated phrases
 * 
 */


add_filter('gettext', 'translate_woo_checkout_wpml');
add_filter('ngettext', 'translate_woo_checkout_wpml');

function translate_woo_checkout_wpml($translated) {

    if (strpos($_SERVER['REQUEST_URI'], '/pokladna/') !== false OR strpos($_SERVER['REQUEST_URI'], '/zur-kasse/') !== false) { //gange your checkout slug

    $my_current_lang = apply_filters('wpml_current_language', NULL);

    // Array 
    $translations = array(
        // Translation for the Slovak version
        'sk' => array( // change language slug
            'Email Adresa' => 'E-mailová adresa', 
            'First name' => 'Meno',
            'Last name' => 'Priezvisko',
            'Address' => 'Adresa',
            'Apartment, suite, etc. (optional)' => 'Číslo popísné',
            'Country/Region' => 'Krajina',
            'City' => 'Mesto',
            'Postal code' => 'PSČ',
            'Phone' => 'Telefón',
            '(optional)' => '(volitelné)'
        ),
        // Translation for the German version
        'de' => array( // change language slug
            'First name' => 'Vorname',
            'Last name' => 'Nachname',
            'Address' => 'Adresszeile 1',
            'Apartment, suite, etc. (optional)' => 'Wohnung, Suite usw. (optional)',
            'Country/Region' => 'Land/Region',
            'City' => 'Stadt',
            'Postal code' => 'Postleitzahl',
            'Phone' => 'Telefon',
            '(optional)' => '(optional)'
            //'Original text' => 'Transated text',
            //'Original text' => 'Transated text'
        ),
        
    );

    // If there are translations for the current language, replace the strings
    if (isset($translations[$my_current_lang])) {
        foreach ($translations[$my_current_lang] as $original => $translation) {
            $translated = str_ireplace($original, $translation, $translated);
        }
    }

    return $translated;
}

}
