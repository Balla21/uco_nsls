<?php
    //page header
    $pageTitle = "Administrator";
    include "include/header.php";
    include "include/data.php";
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $months = ['January','February','March','April','May','June','July','August','September','October','October','December'];
?>

<section class="mt-1 ">

    <div class = "container">
    <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills navbar-dark bg-dark " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active text-white"  data-toggle="pill"  href="#members" role="tab"  
                    aria-selected="true"> Members </a>
                    <a class="nav-link text-white"  data-toggle="pill"  href="#events" role="tab"  
                    aria-selected="true text-white"> Events </a>      
                </div>
            </div>
                <div class=" col-9">
                <!-- members management -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class = "my-3 text-center"> <u> Members management </u> </h3>
                        <p>
                            <button class = "btn-primary" data-toggle="modal" data-target="#memberInfo">Add member</button>
                        </p>

                        <h5 class = "my-3"> <u> Executive Board </u></h5>

                        <table class="table table-bordered">
                            <thead class="thead-dark" >
                                <tr>
                                    <th scope="col" > Name </th>
                                    <th scope="col"> Role </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach( exec_members() as $member ) {
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <span id="first_name"> <?php echo $member["first_name"]." "; ?> </span> 
                                        <span id="last_name"> <?php echo $member["last_name"]; ?></span>  
                                    </td>
                                    <td id="title"> <?php echo $member["title"]; ?> </td>

                                    <td> 
                                        <form method="get" action="adminUpdate.php">
                                            <input type="hidden" name="id" value = <?php echo $member["id"]; ?> >
                                            <button type="submit" class = "btn btn-primary" >Edit</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            
                            </tbody>
                        </table>

                        <hr>

                        <h5 class = "my-3"> <u> Members </u></h5>

                        <table class="table table-bordered mb-5">
                            <thead class="thead-dark" >
                                <tr>
                                    <th scope="col"> Name </th>
                                    <th scope="col"> Major </th>
                                    <th scope="col"> Year </th>         
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach( reg_members() as $member ) {
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <span id="first_name"> <?php echo $member["first_name"]." "; ?> </span> 
                                        <span id="last_name"> <?php echo $member["last_name"]; ?></span>  
                                    </td>
                                    <td> <?php echo $member["major"]; ?> </td>
                                    <td> <?php echo $member["year"]; ?> </td>

                                    <td> 
                                        <form method="get" action="adminUpdate.php">
                                            <input type="hidden" name="updateProcessType" value = "1" >
                                            <input type="hidden" name="id" value = <?php echo $member["id"]; ?> >
                                            <button type="submit" class = "btn btn-primary" >Edit</button>
                                        </form>
                                    </td>

                                </tr>
                                <?php } ?>
                            
                            </tbody>
                        </table>
                   
                </div>
                <!-- /members management -->

                    <!-- events  management -->
                <div class="tab-pane fade mb-5" id="events" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h3 class = "my-3 text-center"> <u> Events management </u> </h3>   
                    <p>
                        <button class = "btn-primary" data-toggle="modal" data-target="#eventInfo">Add event</button>
                    </p>

                    <ul class="list-group ">
                        <?php foreach(get_events() as $event ) {?>
                            <li class="list-group-item bg-dark text-white"> <?php echo $event['name']; ?> </li>
                            <ul>
                                <?php foreach( get_event_calendar($event['id']) as $calendar ) { ?>
                                   <li class="list-group-item">
                                        <?php
                                    
                                            echo $calendar['day']. ", ". $calendar['month']. " ". $calendar['date']; 
                                            echo  " @ ". $calendar['location_building']. ", room " . $calendar['room_number'] ;
                                            echo ", ". $calendar['time'];
                                        ?> 

                                        <form method="get" action="adminUpdateEvent.php">
                                            <input type="hidden" name="calendar-id" value = <?php echo $calendar["id"]; ?> >
                                            <button type="submit" class = "btn btn-primary " >Edit</button>
                                        </form>
                                 </li> 
                                <?php } ?>
                            
                            </ul>
                            

                        <?php } ?>
                    </ul>

                    
                    <!-- events management -->        
                </div>
          </div>
        </div>



    </div>
</section>

<!-- Member Info -->
<div class="modal fade" id="memberInfo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Member Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="include/process/insert.php">
            <input type="hidden" value="1" name="processType"/>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="first_name_member">First name</label>
                    <input type="text" class="form-control" id="member_first_name" name="first_name" >
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name_member">Last name</label>
                    <input type="text" class="form-control" id="member_last_name" name = "last_name" >
                </div>
            </div>

            <div class="form-group">
                <label for="year">Academic year</label>
                <select class="form-control" id="year" name = "year" >
                <option></option>
                   <option value="Freshman">Freshman</option>
                   <option value="Sophomore">Sophomore</option>
                   <option value="Junior">Junior</option>
                   <option value="Senior">Senior</option>
                   <option value="Alumni">Alumni</option>
                </select>
            </div>

            <div class="form-group">
                <label for="major_member">Major</label>
                <input type="text" class="form-control" id="major_member" name="major">
            </div>

            <div class="form-group">
                <label for="membership">Membership</label>
                <select class="form-control" id="membership" name = "membership" >
                <option></option>
                    <?php 
                            foreach(get_role() as $role) {
                    ?>
                    <option value = "<?php echo $role["id"]; ?> "> <?php echo $role["title"]; ?> </option>

                    <?php } ?>
                </select>
            </div>
                      
            <div class="form-check">
                <input class="form-check-input" type="radio" name="induction" id="inducted" value="1">
                <label class="form-check-label" for="inducted">
                    Inducted
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="induction" id="in-progress" value="0" >
                <label class="form-check-label" for="in-progress">
                    In Progress
                </label>
            </div>

            <!-- Button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <!-- Button -->
        </form>        
      </div>    
    </div>
  </div>
</div>
<!-- Member Info -->


<!-- Event Info -->
<div class="modal fade" id="eventInfo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Event Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="include/process/insert.php">
            <input type="hidden" value="2" name="processType"/>
            
            <!-- Event type:Orientation, LTD,... -->
            <div class="form-group mb-4">
                <label for="year">Event type</label>
                <select class="form-control" id="event-type" name = "event-type" >
                    <option value=''></option>
                    <?php foreach(get_events() as $event) { ?>
                        <option value="<?php echo $event['id']; ?>"> 
                             <?php echo $event['name']; ?>
                        </option>
                    <?php  } ?>
                </select>
            </div>

            <!-- Event date -->
            <div class="form-row my-4 ">
                <div class="col">
                    <label for="year"> Day </label>
                    <select class="form-control" id="event-day" name = "event-day" >
                        <option value=''></option>
                        <?php 
                            foreach($days as $day){
                                echo "<option value='$day'>$day</option>";
                            }
                        ?>   
                    </select>
                    </select>
                </div>

                <div class="col">
                    <label for="year"> Month </label>
                    <select class="form-control" id="event-month" name = "event-month" >
                        <option value=''></option>
                        <?php 
                            foreach($months as $month){
                                echo "<option value='$month'> $month</option>";
                            }
                        ?>
                        
                    </select>
                </div>

                <div class="col">
                    <label for="year"> Date </label>
                    <select class="form-control " id="event-date" name = "event-date" >
                    <option value=''></option>
                    <?php 
                        for($i = 1; $i <= 31; $i++){
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>                        
                    </select>
                </div>
               
    
            </div>

            <!-- Event time -->
            <div class="form-row my-4">
                <div class="col ">
                    <label for="start-time"> Start time </label>
                    <input type="text" class="form-control" id="start-time" name="start-time" maxlength="5">  
                </div>
                <div class="col">
                    <label>AM/PM</label>
                    <select class="form-control" id="start-time-day" name = "start-time-day" >
                        <option value=''></option>
                        <option value='AM'>AM</option>
                        <option value='PM'>PM</option>
                    </select>

                </div>

                <div class="col">
                    <label for="end-time"> End time </label>
                    <input type="text" class="form-control" id="end-time" name="end-time" maxlength="5">  
                </div>

                <div class="col">
                    <label>AM/PM</label>
                    <select class="form-control" id="end-time-day" name = "end-time-day" >
                        <option value=''></option>
                        <option value='AM'>AM</option>
                        <option value='PM'>PM</option>
                    </select>
                </div>

            </div>

            <!-- Event location -->
            <div class="form-group ">
                <label for="event-location">Location building</label>
                <input type="text" class="form-control" id="event-location-building" name="event-location-building">
            </div>

            <div class="form-group ">
                <label for="event-location-room mt-5">Room number</label>
                <input type="text" class="form-control col-5" id="event-location-room" name="event-location-room">
            </div>
            
            <!-- Button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <!-- Button -->
        </form>        
      </div>    
    </div>
  </div>
</div>
<!-- Event Info -->
<script src="admin.js"></script>

<?php
    include "include/footer.php";
?>