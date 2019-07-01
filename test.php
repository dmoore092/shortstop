
        <div id='body-main'>
            <script>
                window.onload = function() {
                    $( "#tabs" ).tabs();
                }
            </script>
            <h2>Administration Panel</h2>
            <div id='content'>
            <div id="tabs">
                <ul>
                    <li><a href="#fragment-1">One</a></li>
                    <li><a href="#fragment-2">Two</a></li>
                    <li><a href="#fragment-3">Three</a></li>
                </ul>
                <div id="fragment-1">
                    <h3>Blog Post</h3>
                    <form	id='blog-form'
                            class='admin-panel'
                            method = 'POST'
                            action= 'blog.php'
                            onsubmit = '' 
                            enctype='multipart/form-data' >
                    <input type='text'
                            id = 'title'
                            name = 'title'
                            size = '20'
                            maxlength = '50'
                            placeholder = 'Title'
                            value=''
                            onclick='' />
                    <input type='text'
                            id = 'tags'
                            name = 'tags'
                            size = '20'
                            maxlength = '50'
                            placeholder = 'Tags'
                            value=''
                            onclick='' />
                    <textarea name='post' form='blog-form' col='50' row='10' placeholder='Enter text here...'></textarea>
                    <input type='submit'
                            value='Submit Post'
                            name = 'submit-post'
                            class='btnSubmit'
                            id='btn-post'/>
            <hr>
                    </form>
                </div> <!-- fragment 1 -->
                <div id="fragment-2">
                    <h3>Search for Player</h3>
                    <div id='form-wrapper'>
                        <form   id='player-form'
                                class='admin-panel'
                                method = 'POST'
                                action= ''
                                onsubmit = '' 
                                enctype='multipart/form-data' >
                            <input type='text'
                                    id = 'name'
                                    name = 'name'
                                    size = '20'
                                    maxlength = '50'
                                    placeholder = 'Full Name'
                                    value=''
                                    onclick='' />
                            <select name='sport'>
                                <option value=' ' selected disabled>Select Sport:</option>
                                <option value='football'>Football</option>
                                <option value='basketball'>Basketball</option>
                                <option value='baseball'>Baseball</option>
                                <option value='softball'>Softball</option>
                                <option value='hockey'>Hockey</option>
                                <option value='fieldhockey'>Field Hockey</option>
                                <option value='lacrosse'>Lacrosse</option>
                                <option value='soccer'>Soccer</option>
                                <option value='trackandField'>Track and Field</option>
                                <option value='volleyball'>Volleyball</option>
                                <option value='wrestling'>Wrestling</option>
                                <option value='tennis'>Tennis</option>
                                <option value='swimming'>Swimming</option>
                                <option value='golf'>Golf</option>
                                <option value='gymnastics'>Gymnastics</option>
                                <option value='cheerleading'>Cheerleading</option>
                                <option value='esports'>Esports</option>
                            </select>
                            <select name='state'>
                                <option value=' ' selected disabled>Select State:</option>
                                <option value='New York'>New York</option>
                                <option value='Alabama'>Alabama</option>
                                <option value='Alaska'>Alaska</option>
                                <option value='Arizona'>Arizona</option>
                                <option value='rkansas'>Arkansas</option>
                                <option value='California'>California</option>
                                <option value='Colorado'>Colorado</option>
                                <option value='Connecticut'>Connecticut</option>
                                <option value='Delaware'>Delaware</option>
                                <option value='District of columbia'>District Of Columbia</option>
                                <option value='Florida'>Florida</option>
                                <option value='Georgia'>Georgia</option>
                                <option value='Hawaii'>Hawaii</option>
                                <option value='Idaho'>Idaho</option>
                                <option value='Illinois'>Illinois</option>
                                <option value='Indiana'>Indiana</option>
                                <option value='Iowa'>Iowa</option>
                                <option value='Kansas'>Kansas</option>
                                <option value='Kentucky'>Kentucky</option>
                                <option value='Louisiana'>Louisiana</option>
                                <option value='Maine'>Maine</option>
                                <option value='Maryland'>Maryland</option>
                                <option value='Massachusetts'>Massachusetts</option>
                                <option value='Michigan'>Michigan</option>
                                <option value='Minnesota'>Minnesota</option>
                                <option value='Mississippi'>Mississippi</option>
                                <option value='Missouri'>Missouri</option>
                                <option value='Montana'>Montana</option>
                                <option value='Nebraska'>Nebraska</option>
                                <option value='Nevada'>Nevada</option>
                                <option value='New Hampshire'>New Hampshire</option>
                                <option value='New Jersey'>New Jersey</option>
                                <option value='New Mexico'>New Mexico</option>
                                <option value='New York'>New York</option>
                                <option value='North Carolina'>North Carolina</option>
                                <option value='North Dakota'>North Dakota</option>
                                <option value='Ohio'>Ohio</option>
                                <option value='Oklahoma'>Oklahoma</option>
                                <option value='Oregon'>Oregon</option>
                                <option value='Pennsylvania'>Pennsylvania</option>
                                <option value='Rhode Island'>Rhode Island</option>
                                <option value='South Carolina'>South Carolina</option>
                                <option value='South Dakota'>South Dakota</option>
                                <option value='Tennessee'>Tennessee</option>
                                <option value='Texas'>Texas</option>
                                <option value='Utah'>Utah</option>
                                <option value='Vermont'>Vermont</option>
                                <option value='Virginia'>Virginia</option>
                                <option value='Washington'>Washington</option>
                                <option value='West Virginia'>West Virginia</option>
                                <option value='Wisconsin'>Wisconsin</option>
                                <option value='Wyoming'>Wyoming</option>			
                            </select>
                            <select name='class'>
                            <option value=' ' selected disabled>Class of:</option>
                                <option value='2024'>2024</option>
                                <option value='2023'>2023</option>
                                <option value='2022'>2022</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2020</option>
                                <option value='2019'>2019</option>
                                <option value='2018'>2018</option>
                                <option value='2017'>2017</option>
                                <option value='2016'>2016</option>
                                <option value='2015'>2015</option>
                                <option value='2014'>2014</option>
                                <option value='2013'>2013</option>
                                <option value='2012'>2012</option>
                                <option value='2011'>2011</option>
                                <option value='2010'>2010</option>
                            </select>
                            <input type='text'
                                    id = 'position'
                                    name = 'position'
                                    size = '20'
                                    maxlength = '50'
                                    placeholder = 'Position'
                                    value=''
                                    onclick='' />
                
                            <input type='text'
                                    id = 'school'
                                    name = 'school'
                                    size = '20'
                                    maxlength = '50'
                                    placeholder = 'School'
                                    value=''
                                    onclick='' />                    
                            <select name='gpa'>
                                <option value=' ' selected disabled>Select GPA:</option>
                                <option value='4.5'>Greater than 4.5</option>
                                <option value='4.0'>Greater than 4.0</option>
                                <option value='3.5'>Greater than 3.5</option>
                                <option value='3.0'>Greater than 3.0</option>
                                <option value='2.5'>Greater than 2.5</option>
                                <option value='2.0'>Greater than 2.0</option>
                            </select>
                            <input type='submit'
                                value='Search'
                                name = 'admin-search'
                                class='btnSubmit'
                                id='btn-Submit'/>
                            <input type='submit'
                                value='Download Database'
                                name = 'download-db'
                                class='btnSubmit'
                                id=''/>
            <hr />
                        </form>
                </div> <!-- fragment 2 -->
                <div id="fragment-3">
                    <button style="background-color:#bb0a1e;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1.2em" 
                            id="checkout-button-plan_FJ7HouBZeAK4zB"
                            class="btnSubmit" 
                            role="link"
                            onclick="pay()">
                        Pay For Webhosting
                    </button>
                    </div> <!-- end of form-wrapper -->
                    <div id="error-message"></div>
                </div> <!-- fragment 3 -->
            </div> <!-- end of #tabs -->
            <script>
                //web hosting
                var stripe = Stripe('pk_live_S2WeKKv4ANIOBSjI3FdXx5Uf00TTNsDx2j');
                var checkoutButton = document.getElementById('checkout-button-plan_FJ7HouBZeAK4zB');
                function pay(){
                    stripe.redirectToCheckout({
                        items: [{plan: 'plan_FJ7HouBZeAK4zB', quantity: 1}],
                        successUrl: window.location.protocol + '//www.athleticprospects.com/index',
                        cancelUrl: window.location.protocol + '//www.athleticprospects.com/index',
                    })
                    .then(function (result) {
                        if (result.error) {
                            var displayError = document.getElementById('error-message');
                            displayError.textContent = result.error.message;
                        }
                    });
                }
        </script>
        </div><!-- end of #content -->
        <hr />
        <footer>
            <div id="foot-wrapper">
                <span id="follow">Follow Us!</span>
                <div class="social-media" id="sm-footer">
                    <a href="http://www.facebook.com/Athletic-Prospects-191313784947225" target="_blank" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com/A_Prospects" target="_blank" class="fa fa-twitter"</a>
                    <a href="http://www.instagram.com/athleticprospects" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:kprestano@athleticprospects.com" class="fa fa-envelope"></a>
                </div> <!-- end of social-media -->
                <p id="copyright">&copy; 2018-2019 Athletic Prospects</p>
            </div> <!-- end of foot-wrapper -->
        </footer>
        </div><!-- end of body-main -->
    </body>   
</html>