<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function print_header() {
    
}

/**
 * Set the title of the page.
 * @param string $title  Title of the page.
 */
function set_title($title) {
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '</head>';
    echo '<body>';
}

function print_navigation_menu() {
    require_once 'lib/database/lib.php';
    require_once 'lib/general.php';
    $DB = new DB();
    $DB->db_connect();
    $data = $DB->get_records('navigation', '', array('name'));
    echo '<table border="1">';
    foreach($data as $stuff) {
        echo '<tr>';
        foreach ($stuff as $key => $thing) {
            echo '<td>';
            echo cottam_url('http://localhost/cottam-new/', $thing);
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function print_footer() {
    echo '</body>';
    echo '</html>';
}
?>
