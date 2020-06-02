
<?php
    $processType = $_POST['deleteProcessType'];
    if($processType == '1'){
        $memberId = FILTER_INPUT(INPUT_POST,'member-delete-id',FILTER_SANITIZE_NUMBER_INT );
        include "../connection.php";
        $sql_delete = "delete from member where member.id = :member_id ";
        try{
            $query = $database->prepare($sql_delete);
            $query->bindValue(':member_id',$memberId);
            $query->execute();
            header("location:../../adminPage.php");
        }
        catch(PDOException $error){
            echo "Failed to execute query";
        }
    }
    else if($processType == '2'){
        $eventId = FILTER_INPUT(INPUT_POST,'event-delete-id',FILTER_SANITIZE_NUMBER_INT );
        include "../connection.php";
        $sql_delete = "delete from event_info where event_info.id = :eventInfo_id ";
        try{
            $query = $database->prepare($sql_delete);
            $query->bindValue(':eventInfo_id',$eventId);
            $query->execute();
            header("location:../../adminPage.php");
        }
        catch(PDOException $error){
            echo "Failed to execute query";
        }
    }   
?>