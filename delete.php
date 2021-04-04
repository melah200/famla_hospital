<?php include "includes/header.php" ?>


<?php

if(isset($_GET['deleteprofil']) && $_GET['deleteprofil'] == true){
    //delete the patient 
    $value = escape($_GET['profil']);
    deleteDBEntry('patreg', 'patient_id', $value);
    deleteDBEntry('patienthealthinfo', 'patient_id', $value);
    
    redirect("patientlist.php?deletesuccess=1");
}	
?>