    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3>
                    <img class="brand-logo-dark" src="{{ url('assets/icon.png') }}" width="40px" />
                    ClassSync
                </h3>
                <strong>
                    <img class="brand-logo-dark" src="{{ url('assets/icon.png') }}" width="40px" />
                </strong>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ 'home' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('/home') }}">
                        <i class="fas fa-home"></i>
                        <b>Home</b>
                    </a>
                </li>
                <li class="{{ 'users' == Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ url('/users') }}"><i class="fa fa-users"></i> <b>Usuarios</b></a>
                </li>
                <li class="{{ 'roles' == Request::is('roles*') ? 'active' : '' }}">
                    <a href="{{ url('/roles') }}"><i class="fa fa-user-lock"></i> <b>Privilegios</b></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-clipboard"></i> <b>Bitácora</b></a>
                </li>
                <li class="{{ 'diagramas' == Request::is('diagramas*') ? 'active' : '' }}">
                    <a href="{{ url('/diagramas') }}">
                        <i class="fa fa-cubes"></i>
                        <b>Diagramas</b>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
