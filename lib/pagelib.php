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
    $data = $DB->get_records('plant', '', array('plant_id', 'botanical_name', 'colour_id'));
//    print_object($data);
    echo atable($data);
}

function print_admin_menu() {
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>' . cottam_url('webpages/index.php', 'Web Pages') . '</td>';
    echo '<tr>';
    echo '</table>';
}

function print_footer() {
    echo '</body>';
    echo '</html>';
}

function atable($data) {
    $table = '<table border="1">';
    $table .= '<tr>';
    foreach ($data[0] as $title => $unused) {
        $table .= '<th>';
        $table .= $title;
        $table .= '</th>';
    }
    $table .= '</tr>';
    foreach($data as $stuff) {
        $table .= '<tr>';
        foreach ($stuff as $key => $thing) {
            $table .= '<td>';
            $table .= $thing;
            $table .= '</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
}

?>
