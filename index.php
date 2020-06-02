<?php
    $userLogin = filter_input(INPUT_POST, "user_login" , FILTER_SANITIZE_STRING); 
    $userPassword = filter_input(INPUT_POST, "user_password", FILTER_SANITIZE_STRING);
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if($userLogin == "nslsuco" && $userPassword == "society123nslsuco"){
            header("location:adminPage.php");
        }
    }
    $pageTitle = "Home";
    include "include/header.php";
?>
<div class = "container">
    <!-- Main section of the page -->
    <section class="mt-3 ">
        <div class="container ">
            <!-- slide show -->
            <div class = "row mb-4 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner " >
                        <div class="carousel-item active">
                            <img src="include/img/img1.png" class="mx-auto d-block  w-75 img-fluid" alt="...">
                        </div>   
                    </div>
                </div>
            </div>
                
        </div>
            <!-- slide -->
            <hr class ="mx-5">

            <!-- NSLS info -->
            <div class = "row mb-5">
                <div class = "col-md-4"> 
                    <h4 class = "text-center pb-2"> <u> About Us </u> </h4>
                    <img src = "include/img/nsls-logo.png" class="mx-auto d-block pb-4">
                    <p class="text-justify"> <a href = "https://www.nsls.org/about/aboutus/whoweare" target="_blank" title = "Official website of the National Society of Leadership and Success">
                    The National Society of Leadership and Success </a> is the nation's largest leadership honor society. 
                    Students are selected by their college for membership based on academic and leadership potential.
                    With 658 chapters, the NSLS currently has 1,031,639 members nation wide. </p>
                </div>

                <div class = "col-md-5">
                <h4 class = "text-center pb-2"> <u> Want to join </u> </h4>
                <img src = "include/img/member.jpg" class="mx-auto d-block pb-4">
                    There are two ways to join NSLS Through: 
                    <ul> 
                        <li>  an invitation letter </li>
                        <li> completion of a form  <a href="https://members.nsls.org/nomination/application" target="_blank">the  official Website</a> </li>
                    </ul> 
                    <p> Prospective members undergo <a href = "https://www.nsls.org/memberinfo/stepstoinduction" target="_blank">  leadership training program </a>
                        that prepares them for academic and workplace opportunities.</p>
                
                </div>

                <div class = "col-md-3 ">
                    <h4 class = "text-center pb-2"> <u> Advantages </u> </h4>
                    <p class = "text-center"> With the NSLS, you will gain:</p>
                    <ul class="list-group">
                        <li class="list-group-item"> <b> Leadership skills </b></li>
                        <li class="list-group-item"> <b> Networking skills </b></li>
                        <li class="list-group-item"> <b> Community action</b></li>
                        <li class="list-group-item"> <b> Other great opportunities </b> </li>
                    </ul>

                </div>
            </div>
            <!-- NSLS info -->
            <hr class ="mx-5">
            <h4 class = "text-center mb-4"> Our Location </h4>
            <div class = "row mb-4">
            
                <div class = "col-5">
                    <img src="include/img/forensic.jpg" class="mx-auto d-block pb-4" />
                </div>
                <div class = " offset-2 col-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.9673365616586!2d-97.47265038484908!3d35.6531763802008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87b21fba82486ab7%3A0x75aa4ea545b27867!2sUCO%20-%20Center%20Of%20Forensic%20Science!5e0!3m2!1sen!2sus!4v1589760648749!5m2!1sen!2sus"
                        width="500" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Main section of the page -->

<?php
    include "include/footer.php";
?>