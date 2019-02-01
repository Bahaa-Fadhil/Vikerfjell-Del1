
<?php 

		
	//< Her er det informasjon til sending e-post >
	
    if (isset($_POST['email']))
    
    {
    
	$email_to= "joacimbergh@gmail.com";
	$email_subject= "Mail fra Coif Technologi!";
    $email_from = "Website: Coif Tachnologi Grupp";    
	
    // (Her er det error koder) 
        
    function died($error) {
        echo " Vi beklager, men det ble funnet feil med skjemaet du har sendt inn. ";
        echo " Disse feilene vises nedenfor.<br/><br/>"; 
        echo $error. " <br/><br/>";
        echo "Du kan gå tilbake for å rette opp feil. <br/>";
        die ();
        }
        
    // validering informasjon.
        
        if (!isset($_POST['name']))  
            if (!isset($_POST['etternavn'])) 
                if (!isset($_POST['email'])) 
                    if  (!isset($_POST['comments']))
            {
            deid ("Vi beklager, men det ser ut å være et problem med skjemaet du har sendt inn.");
            }
        
        // Varaiblene for kontakt oss info, og kravene for info.
        
        $name= $_POST['name'];
        $Lastname= $_POST['etternavn'];
        $email= $_POST['email'];
        $telephone= $_POST['telephone'];
        $comments= $_POST['comments'];
        
        
        
        $error_message= "";
        //$email_exp = '/^([a-zA-Z0-9]+[a-zA-Z0-9._%\-\+]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/';
        
        //Hvis kravene til epost ikke oppfylt, vises feilmelding.
        //krav til fornavn.
        $string_exp = "/^[A-Za-z.'-]+$/";
        if (!preg_match($string_exp, $name))
        {$error_message .= 'Fornavn du har angitt ser ikke ut til å være gyldige.<br/>';}        
        
         //krav til etternavn.
        $string_exp = "/^[A-Za-z.'-]+$/";
        if (!preg_match($string_exp, $Lastname))
        {$error_message .= 'Etternavn du har angitt ser ikke ut til å være gyldige.<br/>';}        
        
        
        //krav til kommentar som skal være mer enn 2 bokstaver.
        if (strlen($comments) < 2)
        {$error_message .= 'kommentarene du skrev inn ser ikke ut til å være gyldig.<br/>';}
        
        //hvis det er en annen feil med info, vis error medling.
        if (strlen($error_message) > 0 ) {died ($error_message);}
        
        // legger slette funksjon og retuner info hvis det er feil
        function clean_string ($string)
            
        {
        $bad = array ("content-type", "bcc","to","c", "href");
        return str_replace ($bad, "", $string);
        }
	
        $email_message = "Meldingsdetaljer vises nedenfor.\n\n";
        $email_message .= "Fornavn: " . clean_string($name) . "\n";
        $email_message .= "Etternavn: " . clean_string($Lastname) . "\n";
        $email_message .= "Mobiletelefon: " . clean_string($telephone) . "\n";
        $email_message .= "Email: " . clean_string($email) . "\n";
        $email_message .= "Kommentar:  " . clean_string($comments) . "\n";
        
        // opprette e-post overskrifter
        
        $headers= 'From: ' .$email . "\r\n". 'Reply-To:'  . $email."\r\n" . $email_from. "\r\n".

            'X-Mailer: PHP/' .phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);
        

            echo "<meta http-equiv='refresh'; content='25'; url=sendmail.php>";
            
            


?>

        <!-- suksess meldingen her -->
        <center><br/><br/><br/><br/><br/><br/>
            
            <h1>Meldingen er sendt!<h1><br/>
            <h2>Takk for at du kontaktet oss. vi vil ta kontakt med deg innen kort tid. <br/>
            vennligst klikk <a href=kontaktoss.html> here </a> for å gå tilbake til hjemmesiden.</h2>
        </center>
<style>             
    h1{color:#FF6633;}
    h2{color: black;}
</style>  
        
                
<?php

        } 
?>

