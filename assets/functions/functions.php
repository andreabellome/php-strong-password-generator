<?php

/* start: generare la password in base alla lunghezza e alle ripetizioni */
function generateRandomString($lunghezzaPassword, $ripetizioni, $selectedPassOpts) {
    
    /* start: extract the password options */
    if (isset($selectedPassOpts)) {

        $alphabet = [];
        foreach ( $selectedPassOpts as $opt ) {
            
            if ( $opt == 'lettere' ) {
                $alphabet = array_merge($alphabet, range('A', 'Z'), range('a', 'z'));
            } elseif ( $opt == 'numeri' ) {
                $alphabet = array_merge($alphabet, range('0', '9'));
            } elseif ( $opt == 'simboli' ) {
                $symbols = range('!', '@');
                array_splice($symbols, 15, 10);
                $alphabet = array_merge($alphabet, $symbols);
            }
            
        }  

    } else { /* please check at least one box --> default is lower and upper case letters */
        $alphabet = array_merge(range('A', 'Z'), range('a', 'z'));
    }
    /* end: extract the password options */

    /* start: generate the password */
    if ($ripetizioni == '1' || $lunghezzaPassword > count($alphabet) ){ /* allow repetitions */

        $randomString = '';
        for ($i = 0; $i < $lunghezzaPassword; $i++) {
            $randomKey = array_rand($alphabet);
            $randomString .= $alphabet[$randomKey];
        }

    } else { /* do not allow repetitions */
        
        shuffle($alphabet);
        $randomString = implode('', array_slice($alphabet, 0, $lunghezzaPassword));
        
    }
    /* end: generate the password */

    return $randomString;
}
/* end: generare la password in base alla lunghezza e alle ripetizioni */


?>