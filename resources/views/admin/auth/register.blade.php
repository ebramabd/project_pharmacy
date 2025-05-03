@extends('layouts.login')
@section('title','register new user')
@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <h1>Pharmacy</h1>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>create new user</span>
                        </h6>
                    </div>
                    @include('admin.includes.alerts.errors')
                    @include('admin.includes.alerts.success')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal form-simple" action="{{route('test')}}" method="post"
                                  novalidate>
                                @csrf

                                {{--   input user name   --}}
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="username" class="form-control form-control-lg input-lg"
                                           value="{{old('username')}}" id="username" placeholder=" enter your name">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </fieldset>

                                {{--   input email   --}}
                                {{--                                <fieldset class="form-group position-relative has-icon-left mb-0">--}}
                                {{--                                    <input type="text" name="email" class="form-control form-control-lg input-lg"--}}
                                {{--                                           value="{{old('email')}}" id="email" placeholder="enter your email ">--}}
                                {{--                                    <div class="form-control-position">--}}
                                {{--                                        <i class="ft-user"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                    @error('email')--}}
                                {{--                                    <span class="text-danger">{{$message}}</span>--}}
                                {{--                                    @enderror--}}
                                {{--                                </fieldset>--}}

                                {{--   input user type   --}}
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="type" class="form-control form-control-lg input-lg"
                                           value="{{old('type')}}" id="type" placeholder=" enter your type">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </fieldset>

                                {{--   input password   --}}
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" name="password" class="form-control form-control-lg input-lg"
                                           id="user-password"
                                           placeholder="enter your password">
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </fieldset>

                                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                    Done
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
