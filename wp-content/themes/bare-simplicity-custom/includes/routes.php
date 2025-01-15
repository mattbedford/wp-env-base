<?php

namespace BareSimplicity;

abstract class Routes
{

    // WILL WORK IF TEMPLATE FILE SET CORRECTLY
    public static function Template( $original_template )
    {
        global $wp;
        $request = explode( '/', $wp->request );
        if ( !is_admin()  ) {
            return locate_template('index.php');
        }
        return $original_template;

    }


    // MAY OR MAY NOT WORK
    // Disable 404 redirects when unknown request goes to "/account/<..>/..." which allows a custom template to load. See https://wordpress.stackexchange.com/questions/3326/301-redirect-instead-of-404-when-url-is-a-prefix-of-a-post-or-page-name
    public static function UnknownRequest( $redirect_url )
    {
        return false;
        global $wp;

        if ( !strpos( $wp->request, "wp-admin" ) !== false ) {
            return false;
        }

        return $redirect_url;
    }

    // DOES NOT SEEM TO WORK
    public static function Rewrite() {
        add_rewrite_rule( '(.*?)', 'index.php', 'top' );
    }

    public static function NoFourOhFour($header, $code, $description, $protocol) {
        if (intval($code) === 404) { //Is this a 404 header?
            $description = get_status_header_desc(200); //Get the default 200 description
            return "{$protocol} 200 {$description}"; //Return a 200 status header
        } else { //This isn't a 404 status
            return $header; //Don't change the header
        }
    }

}