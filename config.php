<?php

class Config {

    // ------------------------------------------------------------------------
    // GENERAL SETTINGS
    // ------------------------------------------------------------------------

    const BASE_URL      = 'http://localhost/skedisa';
    const LANGUAGE      = 'english';
    const DEBUG_MODE    = TRUE;

    // ------------------------------------------------------------------------
    // DATABASE SETTINGS
    // ------------------------------------------------------------------------

    // const DB_HOST       = '185.224.138.124';
    // const DB_NAME       = 'u616935663_Skedisa';
    // const DB_USERNAME   = 'u616935663_Skedisau';
    // const DB_PASSWORD   = 'Skedis@123#!;';


    const DB_HOST       = 'localhost';
    const DB_NAME       = 'skedisa';
    const DB_USERNAME   = 'root';
    const DB_PASSWORD   = '';

    // ------------------------------------------------------------------------
    // GOOGLE CALENDAR SYNC
    // ------------------------------------------------------------------------

    const GOOGLE_SYNC_FEATURE   = FALSE; // Enter TRUE or FALSE
    const GOOGLE_PRODUCT_NAME   = '';
    const GOOGLE_CLIENT_ID      = '';
    const GOOGLE_CLIENT_SECRET  = '';
    const GOOGLE_API_KEY        = '';
}

/* End of file config.php */
/* Location: ./config.php */
