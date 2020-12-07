<!DOCTYPE html>
 <html>
    <head>
        <title>Cours Complet Bootstrap 4</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     </head>
     <body>
         <div class="container">
             <h1>Formulaires de creation de service</h1>
             <form>

                @csrf
                 <div class="form-group">
                   <label for="nom">Libelle Album</label>
                   <input type="text" class="form-control" id="nom" placeholder="Heritage">
                 </div>

                 <div class="form-group">
                   <label for="email">Selectionner la date</label>
                   <input type="date" class="form-control" id="date">
                 </div>


                 <div class="form-group">
                    <button type="submit" class="btn btn-primary">Valider</button>
                 </div>

             </form>
         </div>

         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
</html>
