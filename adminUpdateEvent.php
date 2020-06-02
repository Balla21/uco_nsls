<?php
    $pageTitle = "Event update";
    include "include/connection.php";
    include "include/data.php";
    include "include/header.php";
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    $calendar_id = FILTER_INPUT(INPUT_GET, 'calendar-id');
    $eventInfo = get_calendar_info($calendar_id);

?>

<!-- Update  event information -->
<section class="my-5">
    <div class="container col-6 ">
    <h3 class="mb-5 text-center"><u> Update Event information </u></h3>

        <form method="post" action="include/process/update.php">
                <input type="hidden" value="2" name="updateProcessType"/>
                <input type="hidden"  name="eventInfo_id" value="<?php echo $eventInfo['id']; ?>" />
                <!-- Event name -->
                    <div class="form-inline mx-5">
                        <label for="event-location-room ">Event name </label>
                        <input type="text" class="ml-4 form-control col-5"  value="<?php echo $eventInfo['name'] ?>" disabled>
                    </div>
                <!-- Event name -->

                <!-- Event info -->
                    <div class="form-row my-4 ">
                        <div class="col">
                            <label for="year"> Day </label>
                            <select class="form-control" id="event-day-update" name = "event-day-update" >
                                <option value=''></option>
                                <?php foreach($days as $day) { ?>
                                    <option value='<?php echo $day; ?>' 
                                        <?php if($day == $eventInfo['day']) {echo 'selected';} ?> > 
                                    <?php echo $day; ?>   </option>
                                <?php  } ?>   
                            </select>
                        </div>

                        <div class="col">
                            <label for="year"> Month </label>
                            <select class="form-control" id="event-month-update" name = "event-month-update" >
                                <option value=''></option>
                                <?php foreach($months as $month) { ?>
                                    <option value='<?php echo $month; ?>' 
                                        <?php if($month == $eventInfo['month']) {echo 'selected';} ?> > 
                                    <?php echo $month; ?>   </option>
                                <?php  } ?>  
                                
                            </select>
                        </div>

                        <div class="col">
                            <label for="year"> Date </label>
                            <select class="form-control " id="event-date-update" name = "event-date-update" >
                                <option value=''></option>
                                <?php for($i = 1; $i <= 31; $i++){ ?>
                                        <option value='<?php echo $i; ?>' 
                                            <?php if($i == $eventInfo['date']) {echo 'selected';} ?> > 
                                        <?php echo $i; ?>   </option>
                                <?php  } ?>                 
                            </select>
                        </div>
                     </div>
                <!-- Event info -->
                <!-- Event time -->
                    <div class="form-row my-4 col-10">
                        <div class="col ">
                            <label for="start-time"> Time :
                                <span class="font-italic text-danger font-weight-bold">update time using the same format as below</span> 
                            </label>
                            <input type="text" class="form-control" id="time-update" name="time-update" maxlength="20" 
                                                            value="<?php echo $eventInfo['time'] ?>">  
                        </div>
                    </div>
                <!-- Event time -->

                <!-- Event location -->
                <div class="row">                 
                    <div class="col-8">
                        <label for="event-location">Location building</label>
                        <input type="text" class="form-control" id="event-location-building" 
                            name="building-update" value="<?php echo $eventInfo['location_building']; ?>">
                    </div>

                    <div class="col-4 ">
                        <label for="event-location-room mt-5">Room number</label>
                        <input type="text" class="form-control col-5" id="location-room-update" 
                            name="location-room-update" value="<?php echo $eventInfo['room_number']; ?>">
                    </div>
                </div>



                <!-- Button -->
                <div class="modal-footer mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href='adminPage.php'><button type="button" class="btn btn-secondary" >Close</button></a> 
                    
                </div>
                <!-- Button -->
            </form> 

            <form method="post" action="include/process/delete.php">
                    <input type="hidden" name="deleteProcessType" value = '2' />
                    <input type="hidden" name="event-delete-id" value = " <?php echo $eventInfo['id']; ?>"  />
                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
        </div>
</section>

<!-- Update event information -->


<?php include "include/footer.php"; ?>