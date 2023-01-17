
<?php
//include "php/verifysession.php";
include 'func.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyFlix</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/myStyle.css" type="text/css" rel="stylesheet" />

     <!-- Font Awesome -->
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />

    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body style="background-color: rgb(24, 23, 23);">

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark " >
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)"><img src="logo.png" class="rounded" alt="Cinque Terre"
          style=" width: 150px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Home</a>
          </li>

        </ul>
      </div>
    </div>





    <button type="button" class="btn btn-dark" style="font-size:36px" onclick="myFunction()"><i class="fa fa-sign-out" aria-hidden="true"></i></button>

  </nav>


      <!-- Start your project here-->
<!-- Carousel wrapper -->
<div
  id="carouselVideoExample"
  class="carousel slide carousel-fade"
  data-mdb-ride="carousel"
  
>
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner" style="height: 800px; width: 100%;">
    <!-- Single item -->
    <div class="carousel-item active" style="height: 800px; width:100%;">
      <video class="img-fluid" style="width:100%;" autoplay loop muted>
        <source src="Video/1.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5> Smile </h5>
        <p>
        After witnessing a bizarre, traumatic patient incident, Dr. Rose Cotter (Sosie Bacon) starts experiencing terrifying 
        visions. As the lines between reality and nightmares blur, Rose must confront her troubling past to escape her chilling 
        new reality.
        </p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item" style="height: 800px; width:100%;">
      <video class="img-fluid "  style="width:100%;" autoplay loop muted>
        <source src="Video/2.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5> The Lost King </h5>
        <p>
        An amateur historian defies the stodgy academic establishment in her efforts to find King Richard III's remains, which were lost 
        for over 500 years.
        </p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item" style="height: 800px; width: 100%;">
      <video class="img-fluid"  style="width:100%;"  autoplay loop muted>
        <source
          src="Video/5.mp4" type="video/mp4"
        />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5> Don't Worry Darling </h5>
        <p>
        ENJOY CINEMA MOVIES FROM THE COMFORT OF YOUR HOME. A 1950s housewife (Pugh) living with her husband (Styles) in a utopian experimental 
        community begins to worry that his glamorous company may be hiding disturbing secrets.
        </p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
    <!-- End your project here-->

  <div class=" d-flex align-items-center " style="height: 100px;">
    <h1 style="color: rgb(252, 252, 252);">Movies</h1>
  </div>
  <div class=" d-flex align-items-center " style="height: 50px;">
    <h2 style="color: rgb(139, 139, 139);">Most Trending Movies</h2>
  </div>

<div class="row">
<?php
   $mongoViewvideo = mongoViewvideos();
  // print_r($mongoViewvideo);
   foreach($mongoViewvideo as $docs){
      $_id =  $docs->_id;
      $id = $docs->id;
      $mv_name = $docs->mv_name;
      $desctription =  $docs->desctription;
      $category =  $docs->category;
      $mv_length =  $docs->mv_length;
      $director =  $docs->director;
      $year = $docs->year;
      
  ?>
<div class="col-md-3 mb-3">
                 <a href='Video/<?php echo $id."mp4";?>'>
                   <iframe id="<?php echo $id;?>"src="Video/<?php echo $id.".mp4";?>" allowfullscreen></iframe>  
                </a>
                <br>
                <button type="button" style="background-color:black;"><i class="fa fa-thumbs-up" style='font-size:15px;color:blue'></i></button>
                <button type="button" style="background-color:black;"><i class="fa fa-eye" style='font-size:15px;color:blue'></i></button>


</div>
             
<?php
}
?>

  </div>

</body>


    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  
  function myFunction() {
   
   window.location="index.html";
  }
  </script>
    </html>