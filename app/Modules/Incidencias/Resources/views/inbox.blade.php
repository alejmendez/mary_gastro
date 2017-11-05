@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	@include('base::partials.ubicacion', ['ubicacion' => ['Inbox']])
@endsection

@section('content')
	
<div class="main_section">
        <div class="chat_container">
            <div class="col-sm-1 col-md-1"></div>
            <!--chat_sidebar-->
            <div class="col-sm-10 col-md-10 message_section">
                <div class="row">
                    <div class="new_message_head">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="chat_area">
                        <ul class="list-unstyled">
                            <li class="left clearfix">
                            <span class="chat-img1 pull-left">
                            <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                            </span>
                            <div class="chat-body1 clearfix">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                            <div class="chat_time pull-right">09:40PM</div>
                            </div>
                            </li>
                            
                
                            <li class="left clearfix admin_chat">
                            <span class="chat-img1 pull-right">
                            <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                            </span>
                            <div class="chat-body1 clearfix">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                            <div class="chat_time pull-left">09:40PM</div>
                            </div>
                            </li>
                        
                        </ul>
                    </div><!--chat_area-->
                    <div class="message_write">
                        <textarea class="form-control" placeholder="type a message"></textarea>
                            <div class="clearfix"></div>
                                <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                 Add Files</a>
                                <a href="#" class="pull-right btn btn-success">
                                Send</a>
                            </div>
                        </div>
                    </div>
                </div> <!--message_section-->
            </div>
             <div class="col-sm-1 col-md-1"></div>
        </div>  
@endsection
