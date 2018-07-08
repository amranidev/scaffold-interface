<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <title>Smart CRUD GENERATOR v2</title>
</head>
<body>
    <!--The new Front of Scaffold interface-->
    <!-- Still in development stage -->
    <div id="app" class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                    Database
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tables</h5>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Created at</th>
                                        <th>State</th>
                                        <th>Link</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="entity in scaffold" :key="">
                                        <td>@{{entity.tablename}}</td>
                                        <td>@{{entity.package}}</td>
                                        <td>@{{entity.created_at}}</td>
                                        <td><span class = "scaffoldv white-text">TBD</span></td>
                                        <td><a href="" class=""><i class = 'material-icons'>Link</i></a></td>
                                        <td><a href = "" class="delete btn-floating pink modal-trigger">Rollback</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <!--Create Section-->
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                    Create New Table
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">TBD</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var baseURL = "{{ url('/') }}";
    </script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{URL::asset('js/scaffold-interface-js/main2.js')}}"></script>
</body>
</html>
