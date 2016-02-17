<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Scaffold-Interface</title>
    </head>
    <style>
    label {
    width: 100%;
    }
    .scaffoldv{
    border-radius: 3px;
    padding:0 5px 0 5px;
    }
    .input-field label {
    font-size: 0.8rem;
    -webkit-transform: translateY(-140%);
    -moz-transform: translateY(-140%);
    -ms-transform: translateY(-140%);
    -o-transform: translateY(-140%);
    transform: translateY(-140%);
    }
    .pushDown{
    margin-top: 20px;
    }
    </style>
    <body>
        <div class="container">
            <h2 class = "thin">The <i>Scaffold Interface</i> for laravel</h2>
            <div style = 'margin-top: 2cm;'></div>
            <div class = 'row'>
                <div class = 'col s5'>
                    <a class = 'createNewTable btn waves-effect waves-light btn'><i class = 'material-icons left'>create</i>New Table</a>
                    <br>
                    <div class = 'new'>
                    </div>
                </div>
                <div class = 'col s7'>
                    <div class = 'actions'>
                    </div>
                    @if (Session::has('status'))
                    <div class="msg card-panel #fce4ec green lighten-5">
                        <div class = 'row'>
                            <div class = 'col s5'><i class = 'large material-icons'>info</i></div>
                            <div class = 'col s7'><blockquote>
                                {{ Session::get('status') }}
                            </blockquote>
                        </div>
                    </div>
                </div>
                @endif
                <table class = 'centered highlight'>
                    <thead>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>State</th>
                        <th>Link</th>
                        <th>Rollback</th>
                    </thead>
                    <tbody>
                        @foreach($scaffold as $value)
                        <tr>
                            <td>{{$value->tablename}}</td>
                            <td>{{$value->created_at}}</td>
                            <td><span class = "scaffoldv {{$toto = Schema::hasTable($value->tablename) ? 'green' : 'red'}} white-text">{{$toto = Schema::hasTable($value->tablename) ? 'Migrated' : 'Not migrated'}}</span></td>
                            <td><a href="{{URL::to('/')}}/{{lcfirst(str_singular($value->tablename))}}" class = 'btn-floating blue white-text'><i class = 'material-icons'>send</i></a></td>
                            <td><a href = '#modal1' class = 'delete btn-floating modal-trigger pink' data-link = '/scaffold/guidelete/{{$value->id}}/'><i class = 'material-icons'>repeat</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $scaffold->render() !!}
                <div class="pushDown"></div>
                <span>Scaffold-interface <span class = 'scaffoldv blue white-text'>v1.2.1</span></span>
                <p class = 'light'>Copyright (c) {{date('Y')}} Amrani Houssian<br><br>
                    Permission is hereby granted, free of charge, to any person obtaining a copy
                    of this software and associated documentation files (the "Scaffold-Interface"), to deal
                    in the Software without restriction, including without limitation the rights
                    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                    copies of the Software, and to permit persons to whom the Software is
                    furnished to do so, subject to the following conditions:<br><br>
                    The above copyright notice and this permission notice shall be included in
                    all copies or substantial portions of the Software.<br><br>
                    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
                    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                    THE SOFTWARE.
                </p>
                <div class = 'message'></div>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class = "row AjaxisModal">
        </div>
    </div>
    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="large mdi-navigation-menu"></i>
        </a>
        <ul>
            <li><a href = "{{URL::to('/')}}/scaffold/scaffoldHomePage"class="btn-floating blue"><i class="material-icons">view_list</i></a></li>
            <li><a href = "{{URL::to('/')}}/scaffold/scaffoldHomePageDelete"class="btn-floating red darken-1"><i class="material-icons">delete</i></a></li>
            <li><a href = "{{URL::to('/')}}/scaffold/scaffoldHomePageIndex" class="btn-floating #7cb342 light-green darken-1"><i class="material-icons">send</i></a></li>
            <li><a href = "{{URL::to('/')}}/scaffold/rollback" class="btn-floating pink"><i class="material-icons">repeat</i></a></li>
            <li><a href = "{{URL::to('/')}}/scaffold/migrate" class="btn-floating orange"><i class="material-icons">input</i></a></li>
        </ul>
    </div>
</body>
<!--***********************************************************************************************************-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src= "http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script type="text/javascript" src = "{{URL::to('js/AjaxisMaterialize.js')}}"></script>
<script>
var token = '{{Session::token()}}';
var TableData = {!! $scaffoldList !!}
</script>
<script src = "{{URL::to('js/scaffold-interface-js/custom.js')}}"></script>
</html>
