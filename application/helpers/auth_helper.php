<?php
function is_logged_in() {
    $CI =& get_instance();
    return $CI->session->userdata('logged_in') == TRUE;
}

function require_login() {
    if (!is_logged_in()) {
        redirect('auth/login');
    }
}

function get_user_data($key = null) {
    $CI =& get_instance();
    if ($key) {
        return $CI->session->userdata($key);
    }
    return $CI->session->userdata();
}
?>
