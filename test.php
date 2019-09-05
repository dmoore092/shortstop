<?php include("assets/inc/header.inc.php") ?>
<style>
h1{
    text-align: center;
}
h3, button{
    margin-bottom: 5px;
}
p{
    margin-top: 15px;
}
.pagination__controls {
    width: 100%;
    /* text-align: center; */
}
.pagination li{
    display: inline-block;
    background-color: #bb0a1e;
    color: white;
    padding: 10px 20px;
    margin-right: 5px;
    border-radius: 5px;
}
.pagination li a{
    color: white;
}
button{
    background-color: #bb0a1e;
    color: white;
    padding: 15px 30px;
    border-radius: 5px;
    float: right;
}
p{
    clear: both;
}
#blog-pic{
    max-width: auto;
    max-height: 300px;
}
#frame-container{
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
}
#ytplayer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
@media only screen and (min-width: 520px) {
    img{
        position: 
        float: left;        
    }
    #text{
        clear: both;
        border: 2px solid red;
        /* float: right; */
    }
    .clearfix{
        clear: both;
    }
}
</style>
<div id="body-main">   
            <h1>Blog @ Athletic Prospects</h1>
            <hr />
            <div class="blog">
                <div class="post">
                    <form action='blog.php' >
                        <button name='delete-post' value='$postid'>Delete Post</button>
                    </form>
                    <h3>First Real Post Test</h3>
                    <h6>By Keith Prestano</h6>
                    <h6>2019-09-04 15:35:40</h6>
                    <img src='assets/img/blogpictures/black.JPG' alt='blog picture' id='blog-pic' >
                    <p id='text' > 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi posuere porta aliquam. Nunc egestas id nunc eu volutpat. Morbi fringilla venenatis nunc a cursus. 
                        Aliquam quis finibus erat. In non finibus felis. Etiam semper tristique nulla, a luctus tellus vehicula vitae. Morbi at ornare eros. Nam ornare, enim vel congue 
                        bibendum, libero odio euismod ligula, id suscipit nibh augue ac augue. In ante elit, ornare ac pulvinar eu, ultricies a orci. Maecenas scelerisque mattis fringilla. 
                        Sed facilisis sed lorem quis volutpat. Maecenas lacinia quam eu maximus pretium. Phasellus enim nulla, pharetra ut blandit imperdiet, interdum eu nulla. Fusce tellus 
                        dui, gravida vitae urna eu, imperdiet laoreet purus.<br />
                        <br />
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis et purus mi. Curabitur vehicula tempus accumsan. Donec eget 
                        enim vehicula, cursus risus eget, vehicula leo. Mauris dignissim ultrices ante quis ornare. Quisque nec quam ante. Quisque fermentum at mauris id sollicitudin. 
                        Praesent nec imperdiet risus. Donec eu augue odio. In vel diam quis odio euismod malesuada. Proin sed odio pellentesque, porttitor eros quis, porttitor lectus. 
                        Fusce aliquam est sed est blandit semper. Sed dignissim, neque at placerat blandit, lorem lectus lacinia metus, tristique tristique quam quam sit amet velit.<br />
                        <br />
                        Quisque dignissim tempor massa, ac viverra urna luctus ut. Nulla vitae nulla sed nibh tempus varius id nec magna. Etiam faucibus volutpat massa, eget suscipit 
                        libero luctus iaculis. Aliquam ac bibendum ante, ac pharetra felis. Cras elementum ex malesuada sem gravida, in viverra felis volutpat. Duis eu sem nibh. 
                        Aliquam sed dapibus mauris. Sed placerat, felis ut bibendum blandit, sapien enim semper dui, id tristique tortor est ac diam. Fusce gravida risus eget tellus tincidunt 
                        posuere. Maecenas lacinia ligula a metus vehicula, a semper lectus posuere. Quisque felis elit, lacinia nec iaculis sit amet, dignissim eget turpis.<br />
                        <br />
                        Aliquam scelerisque maximus nunc nec aliquam. Praesent vitae ex lorem. Cras consequat nisi non massa sodales tincidunt id in mauris. Nullam pharetra, turpis 
                        vitae volutpat efficitur, nunc libero facilisis enim, in aliquet enim ex quis velit. Cras posuere viverra nulla vulputate vulputate. Curabitur sit amet aliquam 
                        libero, sed consectetur nunc. Ut tristique feugiat nibh a consectetur. Etiam at sapien dignissim, sodales tellus non, posuere est. Sed volutpat neque massa, ac 
                        vulputate enim bibendum vitae. Aliquam risus sem, porta eu turpis et, condimentum blandit nulla. Pellentesque at metus non est feugiat posuere. Cras at placerat 
                        sapien. Curabitur luctus lectus a urna blandit dignissim. Etiam auctor, ante sed facilisis ullamcorper, diam quam tincidunt lacus, eget vestibulum ipsum mauris sed 
                        ligula. Curabitur ac leo pretium, volutpat nulla sit amet, suscipit quam.<br />
                        <br />
                        Sed rutrum at nulla vitae porta. Praesent et lacus mollis, fermentum lorem id, venenatis risus. Donec risus dui, varius nec lobortis at, condimentum hendrerit ante. 
                        Suspendisse et ex mi. Ut vitae tempor sapien. In velit est, tristique at accumsan a, ullamcorper sit amet ex. Praesent imperdiet maximus urna, vitae rutrum risus tempor s
                        ed. Sed augue lacus, condimentum in dolor sed, fermentum facilisis neque. Maecenas a dictum nunc. Sed cursus ligula ante, id efficitur risus dignissim sit amet. Quisque 
                        vulputate nunc eget lobortis feugiat. Donec sed orci at ipsum cursus mattis ut sed arcu. 
                    </p>
                    <p class="clearfix">Tags: Sports, education</p>
                    <hr>
                </div> <!-- enf of .post -->
            </div> <!-- end of .blog -->
</div><!-- end of body-main -->