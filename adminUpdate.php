<?php 
    $pageTitle = "Update member";
    include "include/data.php";
    include "include/header.php";
    $id_member = FILTER_INPUT(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
    $info_member = get_member_info($id_member);
?>

<section class="mt-5 " >
    <div class = "container -mt-5 col-6">
    <h3 class="mb-4 text-center"><u> Edit member information </u></h3>
    <form method="post" action="include/process/update.php">
            <input type="hidden" value="1" name="updateProcessType"/>
            <input type="hidden" name = "member_id" value="<?php echo $id_member; ?>" />
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="first_name_member">First name</label>
                    <input type="text" class="form-control" id="member_first_name" name="first_name"
                     value=" <?php echo $info_member["first_name"]; ?> "  disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name_member">Last name</label>
                    <input type="text" class="form-control" id="member_last_name" name = "last_name" 
                    value=" <?php echo $info_member["last_name"]; ?> " disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="year">Academic year</label>
                <select class="form-control" id="year" name = "member_year"  >
                <option></option>
                   <option value="Freshman" <?php if($info_member["year"] == "Freshman") echo "selected" ; ?> >Freshman</option>
                   <option value="Sophomore" <?php if($info_member["year"] == "Sophomore") echo "selected" ; ?> >Sophomore</option>
                   <option value="Junior" <?php if($info_member["year"] == "Junior") echo "selected" ; ?> >Junior</option>
                   <option value="Senior" <?php if($info_member["year"] == "Senior") echo "selected" ; ?> >Senior</option>
                   <option value="Alumni" <?php if($info_member["year"] == "Alumni") echo "selected" ; ?> >Alumni</option>
                </select>
            </div>

            <div class="form-group">
                <label for="major_member">Major</label>
                <input type="text" class="form-control" id="major_member" name="major"
                value=" <?php echo $info_member["major"]; ?> " disabled>
            </div>

            <div class="form-group">
                <label for="membership">Membership</label>
                <select class="form-control" id="membership" name = "member_membership" placeholder="test" >
                    <option></option>
                    <option value = "1" <?php if($info_member["role_id"] == 1) echo "selected" ; ?> > Student President </option>
                    <option value = "2" <?php if($info_member["role_id"] == 2) echo "selected" ; ?> > Student Vice President </option>
                    <option value = "3" <?php if($info_member["role_id"] == 3) echo "selected" ; ?> > Community Service Chair </option>
                    <option value = "4" <?php if($info_member["role_id"] == 4) echo "selected" ; ?> > Success Networking Team Coordinator </option>
                    <option value = "5" <?php if($info_member["role_id"] == 5) echo "selected" ; ?> > IT Coordinator </option>
                    <option value = "6" <?php if($info_member["role_id"] == 6) echo "selected" ; ?> > Treasurer </option>
                    <option value = "7" <?php if($info_member["role_id"] == 7) echo "selected" ; ?> > member </option>

                </select>
            </div>
                      
            <div class="form-check">
                <input class="form-check-input" type="radio" name="member_induction" 
                id="inducted" value="1"  <?php if($info_member["induction_status"] == 1) echo "checked"; ?> >
                <label class="form-check-label" for="inducted">
                    Inducted
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="member_induction" id="in-progress" value="0" 
                      <?php  if ($info_member["induction_status"] == 0 ) echo "checked"; ?> 
                    >
                <label class="form-check-label" for="in-progress">
                    In Progress
                </label>
            </div>

            <!-- Button -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href='adminPage.php'><button type="button" class="btn btn-secondary" >Close</button></a> 
            </div>
            <!-- Button -->
        </form>        
                <form method="post" action="include/process/delete.php">
                    <input type="hidden" name="deleteProcessType" value = '1' />
                    <input type="hidden" name="member-delete-id" value =" <?php echo $id_member; ?> "/>
                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
    </div>

</section>



