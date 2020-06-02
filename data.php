<?php
    /*
        template function for the execution of sql queries
    */
    function query_template($sql){
        include "connection.php";
        try{
            $result =  $database->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $error){
            echo "query failed to execute";
        }
        return $result;
    }

    /* 
        template function for the execution of a single query
    */

    function single_query_template($sql){
        include "connection.php";
        try{
            $result =  $database->query($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $error){
            echo "query failed to execute";
        }
        return $result;
    }

    /*
        return all the advisors 
    */
    function get_advisors(){  
        $sql_advisors = "select * from advisor";
        return query_template($sql_advisors);
    }
    
    /* this function returns the executive boards members */
    function get_board_members() {
        $sql_board_members = "select * from member join role on member.role_id = role.id where role_id <> 7 order by role.id ";
        return query_template($sql_board_members);
    }

    function exec_members() {
        $sql_exec_members = "select member.id, first_name,last_name, title from member join role on member.role_id = role.id where role_id <> 7 order by role.id";
        return query_template($sql_exec_members);
    }

    function reg_members(){
        $sql_regular_members = "select member.id,first_name, last_name, major,year,title from member join role on member.role_id = role.id 
                where role.title= 'member' order by last_name";
        return query_template($sql_regular_members);
    }

    /* return all the simple members*/
    function get_regular_members(){
        $sql_regular_members = "select first_name, last_name, major,year,title from member join role on member.role_id = role.id 
                where role.title= 'member' order by last_name";
        return query_template($sql_regular_members);
    }


    //function that returns all the role
    function get_role(){
        $sql_role = "select * from role";
        return query_template($sql_role);
    }

    //function that returns information about a specific member
    function get_member_info($id){
        $sql_member_info = "select * from member join role on member.role_id = role.id where member.id = $id ";
        return single_query_template($sql_member_info);
    }


    //function returns events organized by the organization
    function get_events(){
        $sql_events = "select * from event";
        return query_template($sql_events);
    }

    //function that returns a specific dependind of an event
    function get_event_calendar($eventId){
        $sql_calendar = "select event_info.id as id, day, month, date, time, location_building, room_number from event_info ";
        $sql_calendar .= "join event on event_info.event_type = event.id where event.id = $eventId";
        return query_template($sql_calendar);
    }

    //function that returns specific infos about a calendar
    function get_calendar_info($eventInfoId){
        $sql_calendar_info = "select event.name, event_info.id as id, day, month, date, time, location_building, room_number from event_info ";
        $sql_calendar_info .= "join event on event_info.event_type = event.id where event_info.id = $eventInfoId";
        return single_query_template($sql_calendar_info);
    }

?>