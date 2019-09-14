<?php
$id = 26;
    try{
        $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
        //echo "Connected successfully"; 
        $query = "SELECT id, 
                            AES_DECRYPT(username,'!trN8xLnaHcA@cKu') AS username,
                            AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`,
                            AES_DECRYPT(gender,'!trN8xLnaHcA@cKu') AS gender,
                            AES_DECRYPT(email,'!trN8xLnaHcA@cKu') AS email,
                            AES_DECRYPT(`address`,'!trN8xLnaHcA@cKu') AS `address`,
                            AES_DECRYPT(cellPhone,'!trN8xLnaHcA@cKu') AS cellphone,
                            AES_DECRYPT(homePhone,'!trN8xLnaHcA@cKu') AS homephone,
                            AES_DECRYPT(city,'!trN8xLnaHcA@cKu') AS city,
                            AES_DECRYPT(`state`,'!trN8xLnaHcA@cKu') AS `state`,
                            AES_DECRYPT(zip,'!trN8xLnaHcA@cKu') AS zip,
                            AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool,
                            AES_DECRYPT(`weight`,'!trN8xLnaHcA@cKu') AS `weight`,
                            AES_DECRYPT(height,'!trN8xLnaHcA@cKu') AS height,
                            AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear,
                            AES_DECRYPT(major,'!trN8xLnaHcA@cKu') AS major,
                            AES_DECRYPT(commitment,'!trN8xLnaHcA@cKu') AS commitment,
                            AES_DECRYPT(gpa,'!trN8xLnaHcA@cKu') AS gpa,
                            AES_DECRYPT(sat,'!trN8xLnaHcA@cKu') AS sat,
                            AES_DECRYPT(act,'!trN8xLnaHcA@cKu') AS act,
                            AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport,
                            AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition,
                            AES_DECRYPT(secondaryPosition,'!trN8xLnaHcA@cKu') AS secondaryposition,
                            AES_DECRYPT(travelTeam,'!trN8xLnaHcA@cKu') AS travelteam,
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
                            AES_DECRYPT(profileImage,'!trN8xLnaHcA@cKu') AS profileimage,
                            AES_DECRYPT(showcase1,'!trN8xLnaHcA@cKu') AS showcase1,
                            AES_DECRYPT(showcase2,'!trN8xLnaHcA@cKu') AS showcase2,
                            AES_DECRYPT(showcase3,'!trN8xLnaHcA@cKu') AS showcase3,
                            AES_DECRYPT(college,'!trN8xLnaHcA@cKu') AS college,
                            persontype FROM players WHERE id = $id";
        $result = mysqli_query($conn, $query);
        //var_dump($result);
        //mysqli::close($conn);
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    } 


    try{
        $remote = mysqli_connect('nt71li6axbkq1q6a.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ugaf16xakn6l03kv', 'pzai4vad7q5d55gr', 'died52h990bhctqt');
        //echo "Connected successfully"; 
        //$query = "SELECT id, name FROM players;";
        //$result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $key=>$value){
                //var_dump($key);
                //var_dump($value);
                $query = "UPDATE players SET $key = '$value' WHERE id = $id";
                //var_dump($query);
                $result = mysqli_query($remote, $query);
                //var_dump($result);
            }
            mysqli::close($remote);
            //var_dump($row);
        } 
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    }