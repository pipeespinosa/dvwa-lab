<?php

if( isset( $_POST[ 'Upload' ] ) ) {
    // Validación de tipo MIME y extensión
    $allowed_types = array( 'image/jpeg', 'image/png', 'image/gif' );
    $allowed_extensions = array( 'jpg', 'jpeg', 'png', 'gif' );
    $file_extension = strtolower( pathinfo( $_FILES[ 'uploaded' ][ 'name' ], PATHINFO_EXTENSION ) );

    if( !in_array( $_FILES[ 'uploaded' ][ 'type' ], $allowed_types ) || !in_array( $file_extension, $allowed_extensions ) ) {
        $html .= '<pre>Your image was not uploaded. Invalid file type.</pre>';
    } else {
        // Where are we going to be writing to?
        $target_path  = DVWA_WEB_PAGE_TO_ROOT . "hackable/uploads/";
        $target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );

        // Can we move the file to the upload folder?
        if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $target_path ) ) {
            // No
            $html .= '<pre>Your image was not uploaded.</pre>';
        }
        else {
            // Yes!
            $html .= "<pre>{$target_path} succesfully uploaded!</pre>";
        }
    }
}

?>
