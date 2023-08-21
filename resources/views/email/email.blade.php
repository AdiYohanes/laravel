<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "csrf-token" content="{{ csrf_token() }}">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  </head>
  <body class="bg-light">
    <main class="container">    

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <div class="container">
                      <div class="card-body">
                        <form class="form-inline mb-2" action="/action_page.php">
                            <input type="text" class="form-control mb-2" id="name" aria-describedby="emailHelp" placeholder="Name">
                            <input type="text" class="form-control" id="email" placeholder="email">
                            <div class="alert alert-danger d-none"></div>
                            <div class="alert alert-success d-none"></div>

                        </form>
                      </div>
                </div>
                <button type="button" class="btn btn-primary mb-2
                insert-button">Insert</button>

               
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-5">Email</th>
                            <th class="col-md-4">Name</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                </table>
               
          </div>
          <!-- AKHIR DATA -->
    </main>
 

   @include('email.script')
  </body>
</html>