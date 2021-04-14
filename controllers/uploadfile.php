<?php

function upload($upfile) {

    
    try {
        
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($upfile['error']) ||
            is_array($upfile['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }
    
    // Check $upfile['error'] value.
    switch ($upfile['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
        default:
        throw new RuntimeException('Unknown errors.');
    }
    
    // You should also check filesize here.
    if ($upfile['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    
    // DO NOT TRUST $upfile['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($upfile['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
        )) {
            throw new RuntimeException('Invalid file format.');
        }
        
        // You should name it uniquely.
        // DO NOT USE $upfile['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        $file_name = sha1_file($upfile['tmp_name']);
        if (!move_uploaded_file(
            $upfile['tmp_name'],
            sprintf('./images/%s.%s',
            $file_name ,
            $ext
            )
            )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            
            $albumlogo = "$file_name.$ext";
            return $albumlogo;
            
        } catch (RuntimeException $e) {
            
            echo $e->getMessage();
            
        }

        return false;

    }
?>