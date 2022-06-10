<?php 

function rIf($conditional, $renderHTML) {
    if ($conditional === null || trim($conditional) === '') {
        return '';
    } else {
        return $renderHTML;
    }
}

?>