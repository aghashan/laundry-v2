@extends('/layout/quest')
@section('content')
    <div class="row justify-content-center min-vh-100 align-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header font-weight-bold text-primary m-0 py-3">LOGIN</div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <form class="user">
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Username...">
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="password" id="password"
                                            placeholder="Password...">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary font-weight-bold">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
