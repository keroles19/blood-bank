@extends('layouts.app')


@section('content')

@section('page_title')
   Setting of site
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.error')
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('admin/setting/'.$record->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>App email </label>
                            <input type="email" value="{{$record->phone_email}}" name="phone_email" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" value="{{$record->phone}}" name="phone" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input type="url" value="{{$record->fb_link}}" name="fb_link" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>Tweeter Linke</label>
                            <input type="url" value="{{$record->tw_link}}" name="app_store_url" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>App store url</label>
                            <input type="url" value="{{$record->app_store_url}}" name="app_store_url" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label>Notification settings text</label>
                            <textarea class="form-control"  name="notification_settings_text">{{$record->notification_settings_text}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>About app</label>
                            <textarea class="form-control"  name="about_app">{{$record->about_app}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Play store url</label>
                            <input type="text" value="{{$record->play_store_url}}" name="play_store_url" class="form-control" >
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">
                            <span class="fa fa-1x fa-save"> save</span>
                        </button>
                    </div>
                </form>




                <!--  form end       -->
                {{--            @include('partials.form')--}}

            </div>
        </div>

    </div>
</section>
<!-- /.content -->
@endsection
