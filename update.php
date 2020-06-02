<?php   
    
    $updateProcessType = $_POST['updateProcessType'];    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //check process type: 1 for updating member
        if( $updateProcessType == '1'){
            $id_member = $_POST["member_id"];
            $year = $_POST["member_year" ];
            $membership = $_POST["member_membership"];
            $induction = $_POST["member_induction"];
            if(empty($id_member) || empty($year) || empty($membership) || empty($induction) ){
                header("Location:../../adminPage.php");
            }
            else{
                include "../connection.php";
                $sql = "update member set year = :year, role_id = :membership, induction_status = :induction where id = $id_member";
                try{
                    $query = $database->prepare($sql);
                    $query->bindValue(':year', $year);
                    $query->bindValue(':membership', $membership);
                    $query->bindValue(':induction', $induction);
                    $query->execute();
                    header("Location:../../adminPage.php"); 
                }
                catch(PDOException $error){
                        echo "Query failed to execute";
                }
            }
        }

        else if($updateProcessType == '2'){
            //check process type: 2 for updating member
            $eventInfo_id = FILTER_INPUT(INPUT_POST,'eventInfo_id',FILTER_SANITIZE_NUMBER_INT);
            $eventInfo_day = $_POST['event-day-update'];
            $eventInfo_month = $_POST['event-month-update'];
            $eventInfo_date = $_POST['event-date-update'];
            $eventInfo_time = FILTER_INPUT(INPUT_POST,'time-update',FILTER_SANITIZE_STRING);
            $eventInfo_building = FILTER_INPUT(INPUT_POST,'building-update',FILTER_SANITIZE_STRING);
            $eventInfo_room = FILTER_INPUT(INPUT_POST,'location-room-update',FILTER_SANITIZE_NUMBER_INT);

            //One of the input value is empty
            if(empty($eventInfo_id) || empty($eventInfo_day) || empty($eventInfo_month) || empty($eventInfo_date)
                 || empty($eventInfo_time) || empty($eventInfo_building) || empty($eventInfo_room)   ){
                    header("Location:../../adminPage.php");
            }
            else{
                include "../connection.php";

                $sql_event_update = "update event_info set day=:evt_day, month=:evt_month, date=:evt_date, time=:evt_time, ";
                $sql_event_update .= "location_building = :evt_building, room_number=:evt_room where id = $eventInfo_id";
                try{
                    
                    $query = $database->prepare($sql_event_update);
                    $query->bindValue(':evt_day',$eventInfo_day);
                    $query->bindValue(':evt_month',$eventInfo_month);
                    $query->bindValue(':evt_date',$eventInfo_date);
                    $query->bindValue(':evt_time',$eventInfo_time);
                    $query->bindValue(':evt_building',$eventInfo_building);
                    $query->bindValue(':evt_room',$eventInfo_room);
                    $query->execute();
                    header("Location:../../adminPage.php"); 

                }catch(PDOException $error){
                    echo "Failed to execute query";

                }
            }
    
        }

    }

?>