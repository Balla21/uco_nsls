<?php
    $pageTitle = "Calendar";
    include "include/header.php";
    include "include/data.php";
    $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    $semesterMonth = date('F');
    $year = date('Y');
    $semesterTitle = "";
    
    //pick semester title
        //spring semester
      if($semesterMonth == 'January' || $semesterMonth == 'February' || $semesterMonth == 'March'  || $semesterMonth == 'April' || $semesterMonth == 'May'){
        $semesterTitle = "Spring";
       }
         //fall semester
       else if($semesterMonth == 'August' || $semesterMonth == 'September' || $semesterMonth == 'October'  || $semesterMonth == 'November' || $semesterMonth == 'December'){
        $semesterTitle = "Fall";
       }
       // summer semester
       else if($semesterMonth == 'June' || $semesterMonth == 'July' ){
        $semesterTitle = "Summer";
       }
?>

<section class="mt-3 ">
    <div class = "container">
        <h3 class="text-center mb-5"><u> Events Calendar </u> : <?php echo "$semesterTitle  $year ";?> </h3>
    
        <!-- events calendar -->
        <div class ="row col-9 mx-auto mb-5">
            <?php 
                $step = 0;
                foreach(get_events() as $event) {
                     $step++;
            ?>

            <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header bg-dark" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4 class="text-white"> <?php echo "Step $step: ".$event["name"]; ?> </h4>
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-justify">
                <p> <?php echo $event["description"]; ?> </p>
                <br/> 
                    <ul class ="list-group">
                        <?php foreach( get_event_calendar( $event["id"] ) as $calendar ){ ?>
                            <li class ="list-group-item"> 
                                <?php 
                                    echo $calendar['day']. ", ". $calendar['month']. " ". $calendar['date']; 
                                    echo  " @ ". $calendar['location_building']. ", room " . $calendar['room_number'] ;
                                    echo ", ". $calendar['time'];
                                ?>
                            </li>
                        <?php } ?>
                        
                    </ul>
                     
                </div>
                </div>
            </div>

            <?php }?>

        
        
        
        
        
        </div>
         <!-- events calendar -->



    </div>
</section>

<?php
    include "include/footer.php";
?>