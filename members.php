<?php
    $pageTitle = "Members";
    include "include/header.php";
    include "include/data.php";
?>


<section class="mt-1 ">
    <div class = "container">
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills navbar-dark bg-dark " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active text-white"  data-toggle="pill"  href="#advisors" role="tab"  
                    aria-selected="true"> Advisors </a>
                    <a class="nav-link text-white"  data-toggle="pill"  href="#e-board" role="tab"  
                    aria-selected="true text-white"> Executive-Board </a>
                    <a class="nav-link text-white "  data-toggle="pill"  href="#members" role="tab"  
                    aria-selected="true"> Members </a>
                
                </div>
            </div>
                <div class=" col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- advisors -->
                    <div class="tab-pane fade show active" id="advisors" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h3 class = "my-3 text-center"> <u> Chapter advisors </u> </h3>
                    <table class="table table-bordered" >
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> # </th>
                                <th scope="col"> Name </th>
                                <th scope="col"> title </th>
                                <th scope="col"> contact </th>
                                <th scope = "col">Profile</th>
                            </tr>
                        </thead> 
                        <!-- display each advisor -->
                        <tbody>
                            <?php
                                $index = 0;
                                foreach(get_advisors() as $advisor) {
                                $index++;      
                            ?>
                                <tr>
                                  <td> <?php echo $index; ?>  </td>
                                  <td> <?php echo $advisor['name']; ?>  </td>
                                  <td> <?php echo $advisor['title']; ?>  </td>
                                  <td> <?php echo $advisor['contact']; ?>  </td>
                                  <td> 
                                    <a href="<?php echo $advisor['profile']; ?>" type="button" target="_blank">
                                    <?php
                                        if(isset( $advisor['profile'] ) ){
                                            echo " <button class='btn btn-primary'>View</button> ";
                                        }
                                    ?>
                                    </a>   
                                  </td>
                                </tr>
                                 
                            <?php } ?> 
                        </tbody>  
                    </table>               
                </div>

                    <!-- /advisors -->

                    <!-- executive members -->
                    <div class="tab-pane fade" id="e-board" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h3 class = "my-3 text-center"> <u> Executive board members </u> </h3>
                        <table class="table table-bordered text-center" >
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> # </th>
                                <th scope="col"> Name </th>
                                <th scope="col"> Role </th>
                                <th scope="col"> Major </th>
                                <th scope="col"> Year </th>
                                <!-- <th scope="col"> Profile </th> -->
                            </tr>
                        </thead>
                       
                        <?php 
                            $index = 0;
                            foreach ( get_board_members() as $member ) {
                                $index++;
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"> <?php echo $index;?> </th>
                                    <td> <?php echo $member['first_name']. " ". $member['last_name']; ?> </td>
                                    <td> <?php echo $member['title']; ?> </td>
                                    <td> <?php echo $member['major']; ?> </td>
                                    <td> <?php echo $member['year']; ?></td>
                                    <!-- <td> 
                                        <a href="<?php echo $member['profile']; ?>" type="button" target="_blank">
                                        <?php
                                            if(isset( $member['profile'] ) ){
                                                echo " <button class='btn btn-primary'>Profile</button> ";
                                            }
                                        ?>
                                        </a>   
                                  </td> -->
                                </tr>
                            </tbody>
                            
                            
                        <?php } ?>

                        </table>
                    </div>
                    <!-- executive members -->


                    <!-- regular members -->

                    <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <table class="table table-bordered text-center" >
                        <h3 class = "my-3 text-center"> <u> Members </u> </h3>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> # </th>
                                <th scope="col"> Name </th>
                                <th scope="col"> Major </th>
                                <th scope="col"> Year </th>
                            </tr>
                        </thead>
                       
                        <?php 
                            $index = 0;
                            foreach ( get_regular_members() as $member ) {
                                $index++;
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"> <?php echo $index;?> </th>
                                    <td scope="col"> <?php echo $member['first_name']. " ". $member['last_name']; ?> </td>
                                    <td scope="col"> <?php echo $member['major']; ?> </td>
                                    <td scope="col"> <?php echo $member['year']; ?></td>
                                </tr>
                            </tbody>
                            
                        <?php } ?>

                        </table>
                    </div>

                    <!-- regular members -->
                         
                </div>
          </div>
        </div>


    </div>
</section>

<?php
    include "include/footer.php";
?>