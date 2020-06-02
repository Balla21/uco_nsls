<?php
    $processType = $_POST['processType'];    
    // insertion of a member in the database
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if ($processType == '1'){
            $first_name = trim(FILTER_INPUT(INPUT_POST,"first_name",FILTER_SANITIZE_STRING));
            $last_name = trim(FILTER_INPUT(INPUT_POST,"last_name",FILTER_SANITIZE_STRING));
            $major = trim(FILTER_INPUT(INPUT_POST,"major",FILTER_SANITIZE_STRING));
            $year = $_POST["year" ];
            $membership = $_POST["membership"];
            $induction = $_POST["induction"];
            include "../connection.php";

            $sql = "insert into member(first_name,last_name,major,year,induction_status,role_id)";
            $sql .= "values (:fname, :lname, :major, :year, :induction, :role) ";  
            try{
                $query = $database->prepare($sql);
                $query->bindValue(':fname', $first_name);
                $query->bindValue(':lname', $last_name);
                $query->bindValue(':major', $major);
                $query->bindValue(':year', $year);
                $query->bindValue(':induction', $induction);
                $query->bindValue(':role', $membership);
                $query->execute();
                header("Location:../../adminPage.php");
            }
            catch(PDOException $error){
                echo "Failed to exexcute to query";
            }
            
             
        }

        // insertion of an event in the database
        else if ($processType == '2'){
            $event_type = $_POST['event-type'] ;
            $event_day = $_POST['event-day'];
            $event_month = $_POST['event-month'];
            $event_date = $_POST['event-date'];
            
            $start_time_input = FILTER_INPUT(INPUT_POST, 'start-time', FILTER_SANITIZE_STRING);
            $start_time_day = $_POST['start-time-day'];
            $end_time_input = FILTER_INPUT(INPUT_POST, 'end-time', FILTER_SANITIZE_STRING);
            $end_time_day = $_POST['end-time-day'];

            //format time from previous input
            $time = $start_time_input." ".$start_time_day." - ". $end_time_input." ".$end_time_day;

            $event_location_building = FILTER_INPUT (INPUT_POST, 'event-location-building', FILTER_SANITIZE_STRING);
            $event_location_room = FILTER_INPUT (INPUT_POST, 'event-location-room', FILTER_SANITIZE_NUMBER_INT) ;

            $sql_event = "insert into event_info (event_type,day,month,date,time,location_building,room_number)";
            $sql_event .= " value (:evt_type,:day,:month,:date,:time,:loc_build,:room_num)";

            include "../connection.php";
            try{
                $query = $database->prepare($sql_event);
                $query->bindValue(':evt_type',$event_type);
                $query->bindValue(':day',$event_day);
                $query->bindValue(':month',$event_month);
                $query->bindValue(':date',$event_date);
                $query->bindValue(':time',$time);
                $query->bindValue(':loc_build',$event_location_building);
                $query->bindValue(':room_num',$event_location_room);
                $query->execute();
                header("location:../../adminPage.php");
            }
            catch(PDOException $error){
                echo "Failed to exexcute to query";
            }



            
         }

        
    }

?>