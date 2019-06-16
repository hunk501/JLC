@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Settings</li>                        
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Settings
                    </div>
                    <!-- /.panel-heading -->
                    <form method="POST" action="{{ url('settings/update') }}" enctype="multipart/form-data">
                        <div class="panel-body">
                            <!-- Homepage Slider -->
                            <div class="form-group">
                                <label>Homepage Slider</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="homepage_slider">{{ $records['homepage_slider']}}</textarea>
                                </div>
                            </div>
                            <!-- //homepage slider -->
                            <!-- homepage main content -->
                            <div class="form-group">
                                <label>Homepage Main Content</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="homepage_main_content">{{ $records['homepage_main_content']}}</textarea>
                                </div>
                            </div>
                            <!-- //homepage main content -->
                            <!-- homepage comments slider -->
                            <div class="form-group">
                                <label>Homepage Comment Slider</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="homepage_comment_slider">{{ $records['homepage_comment_slider']}}</textarea>
                                </div>
                            </div>
                            <!-- //Homepage comment slider -->
                            <!-- Footer -->
                            <div class="form-group">
                                <label>Footer</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="footer">{{ $records['footer']}}</textarea>
                                </div>
                            </div>
                            <!-- //Footer -->
                            <!-- Services -->
                            <div class="form-group">
                                <label>Services Pages</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="services">{{ $records['services']}}</textarea>
                                </div>
                            </div>
                            <!-- //Services -->
                            <!-- Projects -->
                            <div class="form-group">
                                <label>Projects Pages</label>
                                <div class="form-action">
                                    <textarea style="margin: 0px; height: 284px; width: 1086px;" name="projects">{{ $records['projects']}}</textarea>
                                </div>
                            </div>
                            <!-- //Projects -->
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
@endsection