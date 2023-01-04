<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>TUPC Exit Gate Monitoring System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

    

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        @media (min-width: 992px) {
        .rounded-lg-3 { border-radius: .3rem; }
        }

        input[type="text"]::placeholder {
        text-align: center;
        }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="heroes.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  <h1 class="visually-hidden">TUPC Exit Gate Monitoring System</h1>

  <div class="b-example-divider"></div>

  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg text-center">
        <div class="px-4 py-5 my-5 ">
            <h1 class="display-5 fw-bold">TUPC ID Checking</h1>
            <div class="col-lg-6 mx-auto">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" style="font-size: x-large;">Student Name</label>
                    <form action="functions.php" method="post">
                    <input class="form-control form-control-lg" name = "scanned_id" type="text" placeholder="Scan your ID ..."  autofocus>
                    <button type="submit"  name = "submit_qr_gate">Submit</button>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
  </div>
  <div class="b-example-divider"></div>

  <!-- <div class="b-example-divider mb-0"></div> -->
</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
