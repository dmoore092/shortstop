<?php
    //admin wants to download the Database
    //goes into profile.php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once './PHPMailer/src/Exception.php';
    require_once './PHPMailer/src/PHPMailer.php';
    require_once './PHPMailer/src/SMTP.php';

    if(isset($_POST['download-db'])){      
        try{
            $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
            //echo "Connected successfully"; 
        }
        catch(exception $e){
            //echo "Connection failed: " . $e->getMessage();
        }
        //return $conn;
        
        $email = new PHPMailer(true); 
        //$email->SMTPDebug = 2;                                 // Enable verbose debug output
        $email->isSMTP();                                      // Set mailer to use SMTP
        $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $email->SMTPAuth = true;                               // Enable SMTP authentication
        $email->Username = 'athleticprospects1@gmail.com';                 // SMTP username
        $email->Password = 'Webm@ster1';                           // SMTP password
        $email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $email->Port = 465;                                    // TCP port to connect to
        $email->SMTPDebug = false;
        //Recipients
        $email->setFrom('webmaster@athleticprospects.com', 'Athletic Prospects');
        $email->addAddress('kprestano@athleticprospects.com', 'Keith');     // Add a recipient
        $email->addAddress('dmoore092@gmail.com', 'Dale'); 

        //header('Content-Type: text/csv; charset=utf-8');  
        //header('Content-Disposition: attachment; filename=apdb.csv');  
        $output = fopen("apdb.csv", "w");  
        fputcsv($output, array('id', 'Username', 'Name', 'Gender', 'Email', 'Cellphone', 'Homephone', 'Address', 'City', 'State', 'Zip',
                                'Highschool', 'Weight', 'Height', 'Class Of', 'Sport', 'Primary Position', 'Secondary Position',
                                'Travel Team', 'Gpa', 'Sat', 'Act', 'Major', 'Reference 1 Name', 'Reference 1 Job Title', 'Reference 1 Email', 'Reference 1 Phone', 
                                'Reference 2 Name','Reference 2 Job Title', 'Reference 2 Email', 'Reference 2 Phone','Reference 3 Name', 'Reference 3 Job Title', 
                                'Reference 3 Email', 'Reference 3 Phone', 'Personal Statement', 'Commitment', 'Service', 'Role', 'College', 'Twitter',
                                'Facebook','Instagram', 'Website', 'Desired Characteristics', 'Velocty', 'Gpa Required', 'twitter', 'instagram'));  
        
        $query = "SELECT id, 
                        AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`, 
                        AES_DECRYPT(gender,'!trN8xLnaHcA@cKu') AS gender, 
                        AES_DECRYPT(email,'!trN8xLnaHcA@cKu') AS email, 
                        AES_DECRYPT(cellPhone,'!trN8xLnaHcA@cKu') AS cellphone, 
                        AES_DECRYPT(homePhone,'!trN8xLnaHcA@cKu') AS homephone, 
                        AES_DECRYPT(`address`,'!trN8xLnaHcA@cKu') AS `address`, 
                        AES_DECRYPT(city,'!trN8xLnaHcA@cKu') AS city, 
                        AES_DECRYPT(`state`,'!trN8xLnaHcA@cKu') AS `state`, 
                        AES_DECRYPT(zip,'!trN8xLnaHcA@cKu') AS zip, 
                        AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool, 
                        AES_DECRYPT(`weight`,'!trN8xLnaHcA@cKu') AS `weight`, 
                        AES_DECRYPT(height,'!trN8xLnaHcA@cKu') AS height, 
                        AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear,
                        AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport, 
                        AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition, 
                        AES_DECRYPT(secondaryPosition,'!trN8xLnaHcA@cKu') AS secondaryposition, 
                        AES_DECRYPT(travelTeam,'!trN8xLnaHcA@cKu') AS travelteam, 
                        AES_DECRYPT(gpa,'!trN8xLnaHcA@cKu') AS gpa, 
                        AES_DECRYPT(sat,'!trN8xLnaHcA@cKu') AS sat, 
                        AES_DECRYPT(act,'!trN8xLnaHcA@cKu') AS act, 
                        AES_DECRYPT(major,'!trN8xLnaHcA@cKu') AS major, 
                        AES_DECRYPT(ref1Name,'!trN8xLnaHcA@cKu') AS ref1name,
                        AES_DECRYPT(ref1JobTitle,'!trN8xLnaHcA@cKu') AS ref1jobtitle, 
                        AES_DECRYPT(ref1Email,'!trN8xLnaHcA@cKu') AS ref1email, 
                        AES_DECRYPT(ref1Phone,'!trN8xLnaHcA@cKu') AS ref1phone,
                        AES_DECRYPT(ref2Name,'!trN8xLnaHcA@cKu') AS ref2name, 
                        AES_DECRYPT(ref2JobTitle,'!trN8xLnaHcA@cKu') AS ref2jobtitle,
                        AES_DECRYPT(ref2Email,'!trN8xLnaHcA@cKu') AS ref2email, 
                        AES_DECRYPT(ref2Phone,'!trN8xLnaHcA@cKu') AS ref2phone, 
                        AES_DECRYPT(ref3Name,'!trN8xLnaHcA@cKu') AS ref3name,
                        AES_DECRYPT(ref3JobTitle,'!trN8xLnaHcA@cKu') AS ref3jobtitle,
                        AES_DECRYPT(ref3Email,'!trN8xLnaHcA@cKu') AS ref3email, 
                        AES_DECRYPT(ref3Phone,'!trN8xLnaHcA@cKu') AS ref3phone, 
                        AES_DECRYPT(persStatement,'!trN8xLnaHcA@cKu') AS persstatement, 
                        AES_DECRYPT(commitment,'!trN8xLnaHcA@cKu') AS commitment, 
                        `service`, 
                        persontype, 
                        AES_DECRYPT(college,'!trN8xLnaHcA@cKu') AS college,
                        AES_DECRYPT(twitter,'!trN8xLnaHcA@cKu') AS twitter, 
                        AES_DECRYPT(facebook,'!trN8xLnaHcA@cKu') AS facebook, 
                        AES_DECRYPT(instagram,'!trN8xLnaHcA@cKu') AS instagram, 
                        AES_DECRYPT(website,'!trN8xLnaHcA@cKu') AS website, 
                        AES_DECRYPT(characteristics,'!trN8xLnaHcA@cKu') AS characteristics, 
                        AES_DECRYPT(velocity,'!trN8xLnaHcA@cKu') AS velocity, 
                        AES_DECRYPT(gpareq,'!trN8xLnaHcA@cKu') AS gpareq,
                        AES_DECRYPT(twitter,'!trN8xLnaHcA@cKu') AS twitter,
                        AES_DECRYPT(instagram,'!trN8xLnaHcA@cKu') AS instagram 
                    FROM players;";  
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){  
            fputcsv($output, $row);  
        }  
        
        fclose($output);
        MYSQLI_CLOSE($conn);
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $email->addAttachment('apdb.csv');    // Optional name
 
        //Content
        $email->isHTML(true);                                  // Set email format to HTML
        $email->Subject = 'Database Export';
        $email->Body    = "Here is the current DB. Some fields like passwords, and links to images are omitted";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        try{
            $email->send();
            //echo 'Message has been sent';
        } 
        catch (Exception $e) {
            //echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    } 
?>