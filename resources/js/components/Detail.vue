<template>
<div>
  
<navbar> 
  
</navbar>
  <div id="news">      
	    <article class="blog-post px-3 py-5 p-md-5">
       
		    <div class="container">
			    <header class="blog-post-header">
				    <h2 class="title mb-2">A </h2>
			    </header>	    
			    <div class="blog-post-body">
				    <figure class="blog-banner">
				      <img class="img-fluid border border-dark" src="blog.png" height="800px" width="800px" alt="image">
	
				    </figure>
				    <p> You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...
             You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...
             You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...
             You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...
             You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...
             You probably know this next part by heart. You have the right to remain silent. 
            Anything you say can and will be used against you in a court of law ...</p>
				    
                </div>
            </div><!--//container-->
          
	    </article>
</div>
<section class="content-item" id="comments">
<div class="container"> 
    	<div class="row">
            <div class="col-sm-8"> 
                <form >
                	<h3 class="pull-left">New Comment</h3>
                    <fieldset>
                        <div class="row row-space">  
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<img class="img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png" width="127px" height="100px" alt="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" id="message" name="content" placeholder="Your message" required=""></textarea>
              
                            </div>
                             
                        </div>  
                        
                    </fieldset>
                    <button type="submit" class="btn btn-danger"> Submit</button>
                </form>
                <br>
	 
                <h3>Comments</h3>
                
                <!-- COMMENT 1 - START -->
 	
                <div class="media">
                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">1</h4>
                        <p> HI</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li> <p class="pull-right"><small>20/05/2021</small></p></li>
              
                        </ul>
                      
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</section>


</div>


</template>

<script>
import Navbar from "./Navbar";
export default {
  name:"Detail",
   components: {
    Navbar
  },

}
</script>

<style>

 body {
  font-family: 'Nunito', sans-serif;
 }
 body{margin-top:20px;}
#comments{
  width: 100%;
}
#news{
  float: left;
}
.content-item {
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
	height:100%;
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}


#comments {
    box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
	background-color:#FFFFFF;
}

#comments form {
	margin-bottom:30px;
}

#comments .btn {
	margin-top:7px;
}

#comments form fieldset {
	clear:both;
}

#comments form textarea {
	height:100px;
}

#comments .media {
	border-top:1px dashed #DDDDDD;
	padding:20px 0;
	margin:0;
}

#comments .media > .pull-left {
    margin-right:20px;
}

#comments .media img {
	max-width:100px;
}

#comments .media h4 {
	margin:0 0 10px;
}

#comments .media h4 span {
	font-size:14px;
	float:right;
	color:#999999;
}

#comments .media p {
	margin-bottom:15px;
	text-align:justify;
}

#comments .media-detail {
	margin:0;
}

#comments .media-detail li {
	color:#AAAAAA;
	font-size:12px;
	padding-right: 10px;
	font-weight:600;
}

#comments .media-detail a:hover {
	text-decoration:underline;
}

#comments .media-detail li:last-child {
	padding-right:0;
}

#comments .media-detail li i {
	color:#666666;
	font-size:15px;
	margin-right:10px;
}

</style>