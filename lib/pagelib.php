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
    require_once '/var/www/cottam-new/lib/database/lib.php';
    require_once '/var/www/cottam-new/lib/general.php';
    $DB = new DB();
    $DB->db_connect();
    $data = $DB->get_records('navigation');
    print_object($data);
//    echo atable($data);
}

function print_admin_menu() {
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>' . cottam_url('webpages/index.php', 'Web Pages') . '</td>';
    echo '<tr>';
    echo '</table>';
//    $funk = array('0' => 'Hi', '1' => 'yeah');
//    print_object($funk);
//    echo atable($funk,'hi');
}

function print_footer() {
    echo '</body>';
    echo '</html>';
}

function atable($data, $headers) {
    $table = '<table border="1">';
    $table .= '<tr>';
    if (!empty($headers)) {
        foreach ($headers as $title) {
            $table .= '<th>';
            $table .= $title;
            $table .= '</th>';
        }
    } else {
        foreach ($data[0] as $title => $unused) {
            $table .= '<th>';
            $table .= $title;
            $table .= '</th>';
        }
    }
    $table .= '</tr>';
    foreach($data as $stuff) {
        $table .= '<tr>';
        foreach ($stuff as $thing) {
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
