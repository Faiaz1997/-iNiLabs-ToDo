<nav style="background-color: #7752FE;">
    <div class="row">
        <div class="col-12 ">
            <div class="row d-flex align-items-center m-2">
                <div class="col-3">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets')}}/images/to-do-list.png" width="60px" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <form class="row d-flex justify-content-center align-items-center m-auto" method="post" action="{{route('expired.tasks')}}">
                        @csrf
                        <div class="col-3">
                            <div class="form-outline">
                                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="col-3 ">
                            <div class="form-outline">
                                <button type="submit" class="btn btn-warning">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <div class="logout">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>