<!DOCTYPE html>
<?php $relpath= ""; $title="signup"; $page="signup";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <form id="player-form"
                  method = "POST"
                  action= ""
                  onsubmit = "" >
                <h1>Player Info</h1>
                <div id="refs-container">
                <p>
                <!-- <span class="span">First Name:* &nbsp; </span> -->
                    <input type="text"
                           id = "firstname"
                           name= "firstname"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your First Name*"
                           value="<?= $_POST['firstname']  ?>"
                           onclick="" />
                </p>
                <p>
                <!--   <span class="span">Last Name:* &nbsp; </span> -->
                    <input type="text"
                           id = "lastname"
                           name= "lastname"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Last Name*"
                           value="<?= $_POST['lastname']  ?>"
                           onclick="" />
                </p>
                <p>
                <!--    <span class="span">Email:* &nbsp; </span> -->
                    <input type="email"
                           id = "email"
                           name= "email"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Email*"
                           value="<?= $_POST['email']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Cell Phone:* &nbsp; </span> -->
                    <input type="text"
                           id = "cellphone"
                           name= "cellphone"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Cellphone*"
                           value="<?= $_POST['cellphone']  ?>"
                           onclick="" />
                </p>
                <p>
                 <!--   <span class="span">Home Phone:* &nbsp; </span> -->
                    <input type="text"
                           id = "homephone"
                           name= "homephone"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Home Phone*"
                           value="<?= $_POST['homephone']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Address:* &nbsp; </span> -->
                    <input type="text"
                           id = "address"
                           name= "address"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Address*"
                           value="<?= $_POST['address']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">City:* &nbsp; </span> -->
                    <input type="text"
                           id = "city"
                           name= "city"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your City*"
                           value="<?= $_POST['city']  ?>"
                           onclick="" />
                </p>
                <p>
                   <!-- <label class="span" for="state">State</label> -->
			        <select id="state" name="state">
                        <option value="" disabled selected>Your State*</option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District of Columbia">District of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Guam">Guam</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Northern Marianas Islands">Northern Marianas Islands</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Virgin Islands">Virgin Islands</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>
                    </select>
                </p>
                <p>
                  <!--  <span class="span">Zip:* &nbsp; </span> -->
                    <input type="text"
                           id = "zip"
                           name= "zip"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Zip*"
                           value="<?= $_POST['zip']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">High School:* &nbsp; </span> -->
                    <input type="text"
                           id = "highschool"
                           name= "highschool"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Highschool*"
                           value="<?= $_POST['highschool']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Weight:* &nbsp; </span> -->
                    <input type="text"
                           id = "weight"
                           name= "weight"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Weight*"
                           value="<?= $_POST['weight']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Height:* &nbsp; </span> -->
                    <input type="text"
                           id = "height"
                           name= "height"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Height*"
                           value="<?= $_POST['height']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Graduation Year*: &nbsp; </span> -->
                    <input type="text"
                           id = "grad-year"
                           name= "grad-year"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Graduation Year*"
                           value="<?= $_POST['grad-year']  ?>"
                           onclick="" />
                </p>
                <p>
                <!--    <span class="span">Sport:* &nbsp; </span> -->
                    <input type="text"
                           id = "sport"
                           name= "sport"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Sport(s) -- CHANGE THIS"
                           value="<?= $_POST['sport']  ?>"
                           onclick="" />
                </p>
                <p>
                 <!--   <span class="span">Primary Position:* &nbsp; </span> -->
                    <input type="text"
                           id = "primary-position"
                           name= "primary-position"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Primary Position*"
                           value="<?= $_POST['primary-position']  ?>"
                           onclick="" />
                </p>
                <p>
                 <!--   <span class="span">Secondary Position:* &nbsp; </span> -->
                    <input type="text"
                           id = "secondary-position"
                           name= "secondary-position"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Secondary Position*"
                           value="<?= $_POST['secondary-position']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">Travel Team:* &nbsp; </span> -->
                    <input type="text"
                           id = "travel-team"
                           name= "travel-team"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your Trvel Team*"
                           value="<?= $_POST['travel-team']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">GPA:* &nbsp; </span> -->
                    <input type="text"
                           id = "gpa"
                           name= "gpa"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your GPA*"
                           value="<?= $_POST['gpa']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">SAT: &nbsp; </span> -->
                    <input type="text"
                           id = "sat"
                           name= "sat"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your SAT Score"
                           value="<?= $_POST['sat']  ?>"
                           onclick="" />
                </p>
                <p>
                  <!--  <span class="span">ACT: &nbsp; </span> -->
                    <input type="text"
                           id = "act"
                           name= "act"
                           size = "35"
                           maxlength = "50"
                           placeholder = "Your ACT Score"
                           value="<?= $_POST['act']  ?>"
                           onclick="" />
                </p>
                                    </div><!-- end of test -->
                <hr/>
                <h3>Player Image and Video</h3>
                <div id="refs">
                    <p>
                        <span class="span">Upload Player Profile Picture: &nbsp; </span>
                        <input type="file" name="profile-pic" accept="image/*">
                    </p>
                    <p>
                        <span class="span">Upload Video(Showcase): &nbsp; </span>
                        <input type="file" name="showcase-vid" accept="videos/*">
                    </p>
                    <p>
                        <span class="span">Upload Video(Showcase): &nbsp; </span>
                        <input type="file" name="showcase-vid" accept="videos/*">
                    </p>
                </div><!-- end of refs -->
                <hr/>
                <h3>References</h3>
                <div id="refs-container">
                <div id="refs">
                <p>Reference 1(Optional)</p>
                    <p>
                      <!--  <span class="span">First Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref1-first-name"
                               name = "ref1-first-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 1 First Name"
                               value="<?= $_POST['ref1-first-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Last Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref1-last-name"
                               name = "ref1-last-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 1 Last Name"
                               value="<?= $_POST['ref1-last-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Job Title: &nbsp; </span> -->
                        <input type="text"
                               id = "ref1-job-title"
                               name = "ref1-job-title"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 1 Job Title"
                               value="<?= $_POST['ref1-job-title']  ?>"
                               onclick="" />
                    </p>
                    <p>
                     <!--   <span class="span">Email: &nbsp; </span> -->
                        <input type="email"
                               id = "ref1-email"
                               name = "ref1-email"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 1 Email"
                               value="<?= $_POST['ref1-email']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Phone Number: &nbsp; </span> -->
                        <input type="text"
                               id = "ref1-phone"
                               name = "ref1-phone"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 1 Phone Number"
                               value="<?= $_POST['ref1-phone']  ?>"
                               onclick="" />
                    </p>
                    </div><!-- end of refs -->
                <div id="refs">
                <p>Reference 2(Optional)</p>
                    <p>
                      <!--  <span class="span">First Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref2-first-name"
                               name = "ref2-first-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 2 First Name"
                               value="<?= $_POST['ref2-first-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                     <!--   <span class="span">Last Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref2-last-name"
                               name = "ref2-last-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 2 Last Name"
                               value="<?= $_POST['ref2-last-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Job Title: &nbsp; </span> -->
                        <input type="text"
                               id = "ref2-job-title"
                               name = "ref2-job-title"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 2 Job Title"
                               value="<?= $_POST['ref2-job-title']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Email: &nbsp; </span> -->
                        <input type="email"
                               id = "ref2-email"
                               name = "ref2-email"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 2 Email"
                               value="<?= $_POST['ref2-email']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Phone Number: &nbsp; </span> -->
                        <input type="text"
                               id = "ref2-phone"
                               name = "ref2-phone"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 2 Phone Number"
                               value="<?= $_POST['ref2-phone']  ?>"
                               onclick="" />
                    </p>
                    </div><!-- end of refs -->
                
                <div id="refs">
                <p>Reference 3(Optional)</p>
                    <p>
                     <!--   <span class="span">First Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-first-name"
                               name = "ref3-first-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 First Name"
                               value="<?= $_POST['ref3-first-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Last Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-last-name"
                               name = "ref3-last-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Last Name"
                               value="<?= $_POST['ref3-last-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Job Title: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-job-title"
                               name = "ref3-job-title"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Job Title"
                               value="<?= $_POST['ref3-job-title']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Email: &nbsp; </span> -->
                        <input type="email"
                               id = "ref3-email"
                               name = "ref3-email"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Email"
                               value="<?= $_POST['ref3-email']  ?>"
                               onclick="" />
                    </p>
                    <p>
                        <!-- <span class="span">Phone Number: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-phone"
                               name = "ref3-phone"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Phone Number"
                               value="<?= $_POST['ref3-phone']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Personal Statement: &nbsp; </span> -->
                        <textarea placeholder="Personal Statement..." rows="4" cols="50" name="pers-statement" form="player-form"></textarea>
                    </p>
                    
                <!-- <label class="span" for="service">Choose Service</label> -->
			        <select id="service" name="service">
                        <option value="" disabled selected>Choose Service</option>
                        <option value="free">Free Player Profile</option>
                        <option value="biweekly">Bi-weekly recruiting checklist and articles - $100/per year</option>
                        <option value="mentor1yr">Mentor Program 1 year - $1099</option>
                        <option value="mentor6mo">Mentor Program 6 months - $650</option>
                    </select>
                </div><!-- end of refs -->
                    <div id="refs" class="hide">
                        <p>Reference 4(Optional)</p>
                    <p>
                     <!--   this whole section below is hidden forever -->
                        <input type="text"
                               id = "ref3-first-name"
                               name = "ref3-first-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 First Name"
                               value="<?= $_POST['ref3-first-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Last Name: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-last-name"
                               name = "ref3-last-name"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Last Name"
                               value="<?= $_POST['ref3-last-name']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Job Title: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-job-title"
                               name = "ref3-job-title"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Job Title"
                               value="<?= $_POST['ref3-job-title']  ?>"
                               onclick="" />
                    </p>
                    <p>
                      <!--  <span class="span">Email: &nbsp; </span> -->
                        <input type="email"
                               id = "ref3-email"
                               name = "ref3-email"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Email"
                               value="<?= $_POST['ref3-email']  ?>"
                               onclick="" />
                    </p>
                    <p>
                        <!-- <span class="span">Phone Number: &nbsp; </span> -->
                        <input type="text"
                               id = "ref3-phone"
                               name = "ref3-phone"
                               size = "35"
                               maxlength = "50"
                               placeholder = "Reference 3 Phone Number"
                               value="<?= $_POST['ref3-phone']  ?>"
                               onclick="" />
                    </p>
                    </div><!-- end of hidden part -->
                    </div><!-- end of test-container -->
                <input type="submit"
                       value="Submit Form"
                       name = "submit"
                       class="button"
                       id="btnSubmit"/>
        
                <input type="submit"
                       value="Get Players"
                       name = "getPlayers"
                           class="button"
                           id="getPlayers"/>
                    
            <?php include "submit_profile.inc.php"; ?>
        </form>
    </body>
    <footer>
        <div class="Footer">
        </div>
    </footer>
</html>