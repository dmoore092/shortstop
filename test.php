<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/javascript/jqueryui-1.12.1/jquery-ui.css" />
        <script type="text/javascript" src="assets/javascript/jqueryui-1.12.1/jquery-ui.js"></script>
</head>
<script>
    window.onload = function() {
        $( "#edit-tabs" ).tabs();
    }
</script>
<div id="edit-tabs">
    <ul>
        <li><a href="#about-us" class="tab-headers">Edit About Us</a></li>
        <li><a href="#home-page" class="tab-headers">Edit Home Page</a></li>
    </ul>
    <div id="about-us">
        <form id='edit-about-us-form'
                class='edit-about-us'
                method = 'POST'
                enctype='multipart/form-data'>
            <input type='text'
                id = 'about-us-header'
                name = 'about-us-header'
                size = '20'
                maxlength = '50'
                placeholder = 'Header'/>
            <textarea name='about-us-content' form='edit-about-us-form' col='50' row='10' placeholder='Enter text here...'></textarea>
            <input type='submit'
                value='Submit "About Us" Section'
                name = 'submit-about-us'
                class='btnSubmit'
                id='btn-about-us'/>
        </form>
    </div> <!-- end of about-us -->
    <div id="home-page">
        <form id='edit-home-page-form'
                class='edit-home-page'
                method = 'POST'
                enctype='multipart/form-data'>
            <input type='text'
                id = 'home-page-header'
                name = 'home-page-header'
                size = '20'
                maxlength = '50'
                placeholder = 'Header'/>
            <textarea name='home-page-content' form='edit-home-page-form' col='50' row='10' placeholder='Enter text here...'></textarea>
            <input type='submit'
                value='Submit "Home Page" Section'
                name = 'submit-home-page'
                class='btnSubmit'
                id='btn-home-page'/>
        </form>
    </div> <!-- end of home-page -->
</div> <!-- end of edit-tabs-->
</html>