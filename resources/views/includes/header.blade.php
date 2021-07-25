<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"> Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('dashboard')}}">mdxHub</a>
            </div>

            <!-- Collect the nav links, forms and other content for togglnig -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form action="{{route('search')}}" method="get">
                            <input class="form-control" type="text" name="search" required>
                            <button class="btn btn-primary" type="submit">Search...</button>
                        </form>
                    </li>
                    <li></li>
                    <li><a href="{{route('event')}}">Events</a></li>
                    <li><a href="{{route('account')}}">Account</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
