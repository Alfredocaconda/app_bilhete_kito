<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Macon | Entrar</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link rel="stylesheet" href="css/backend-plugin.min.css">
      <link rel="stylesheet" href="css/backend.css?v=1.0.2">
      <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="vendor/@icon/dripicons/dripicons.css">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-12">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <h2 class="mb-2">Acesso ao Sistema</h2>
                        <p></p>
                        <form action="{{route('user.auth')}}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="mb-0">E-mail</label>
                                    <input class="form-control" name="email" type="email" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="mb-0">Senha</label>
                                    <input class="form-control" name="password" type="password" placeholder=" ">
                                 </div>
                              </div>
                             
                              
                           </div>
                           <button type="submit" class="btn btn-primary btn-lg mb-2" >Entrar</button>
                           <p>Ainda não possui conta como cliente?<a href="{{route('form')}}"> Cadastrar</a> </p>
                        </form>
                     </div>
                     <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="images/login/01.png" class="img-fluid w-80" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="js/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="js/app.js"></script>
  </body>
</html>