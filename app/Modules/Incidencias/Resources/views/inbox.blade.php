@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	@include('base::partials.ubicacion', ['ubicacion' => ['Inbox']])
@endsection

@section('content')
	
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
			<div class="panel-group accordion" id="accordion3">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		                <h4 class="panel-title">
		                	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"><center><h3 class="panel-title"></h3></center> </a>
		                </h4>
		            </div>
		            <div id="collapse_3_1" class="panel-collapse in">
		                <div class="panel-body">
		            		<center><table id="tabla1" class="table table-striped table-hover table-bordered tables-text">
								<thead>
									<tr>
										<td style="width: 10%; text-align: center;">Caso</td>
										<td style="width: 90%; ">{{$incidencia->caso}}</td>	
									</tr>
									<tr>
										<td style="width: 10%; text-align: center;">Descripcion</td>
										<td style="width: 90%; ">{{$incidencia->descripcion}}</td>	
									</tr>
								</thead>
							</table></center>
		                </div>
		            </div>
		        </div>
		    </div>	
		</div>
        <div class="col-md-1"></div>
    </div>
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
                        <ul class="list-unstyled"  id="msj">

                          
                        
                        </ul>
                    </div><!--chat_area-->
                    <div class="message_write">
                        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}

                            <textarea class="form-control"  id="texto" placeholder="type a message" name="msj"></textarea>
                            <div class="clearfix"></div>
                                <div class="chat_bottom">
                                    <input id="upload" name="archivo"  class="pull-left  btn-file" type="file"/> 
                                
                                    <input type="hidden" name ="incidencia_id" value="{{$incidencia->id}}">
                                    <button id="" type="submit" class=" pull-right btn blue tooltips" >
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        <span class="visible-lg-inline visible-md-inline">Enviar</span>
                                    </button>
                                </div>
                            </div>   
                        {!! Form::close() !!}   
                    </div>
                </div> <!--message_section-->
            </div>
            <div class="col-sm-1 col-md-1"></div>
        </div> 
    </div> 
@endsection
@push('js')
	<script>
		var $id   = "{{$incidencia->id}}";
        var $foto = "{{ url('public/img/usuarios/') }}";
	</script>
@endpush
