<nav style="background-color: #7752FE; height:70px">
    <div class="container pt-2 pb-2 h-100">
        <div class="row align-items-center h-100">
            <div class="col-3">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/to-do-list.png') }}" width="45px" alt="logo">
                </a>
            </div>
            <div class="col-6">
                <form class="row " method="post" action="{{ route('expired.tasks') }}">
                    @csrf
                    <div class="col-10">
                        <div class="form-outline text-start">
                            <input type="date" class="form-control text-center" id="date" name="date" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-2 text-end">
                        <div class="form-outline">
                            <button type="submit" class="btn btn-warning">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 text-end">
                <div class="logout">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
