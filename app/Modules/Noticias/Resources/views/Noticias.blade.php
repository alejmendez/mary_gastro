@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
		@include('base::partials.botonera')

		@include('base::partials.ubicacion', ['ubicacion' => ['Noticias']])

		@include('base::partials.modal-busqueda', [
			'titulo' => 'Buscar Noticias.',
			'columnas' => [
				'Titulo' => '33.3',
				'Resumen' => '33.3',
			]
		])
@endsection

@section('content')
	<div class="row">
		{!! Form::open(['id'=>'formulario', 'name'=>'formulario', 'method'=>'POST'])!!}
			@if ($controller->puedepublicar())
				<div class="form-group col-md-4">
					<label for="titulo" class="requerido">Titulo</label>
					<input class="form-control" required="required" id="titulo" name="titulo" type="text" v-model="message">
				</div>
				<div class="form-group col-md-4">
					<label for="slug" class="requerido">SLUG</label>
					<input class="form-control" placeholder="Slug" required="required" id="slug" name="slug" type="text" value="">
				</div>
				{{ Form::bsText('published_at', '', [
					'label' => 'Fecha',
					'placeholder' => 'Fecha de Publicación',
					'class_cont' => 'col-md-4'
				]) }}
			@else
				<div class="form-group col-md-6">
					<label for="titulo" class="requerido">Titulo</label>
					<input class="form-control" required="required" id="titulo" name="titulo" type="text" v-model="message">
				</div>
				<div class="form-group col-md-6">
					<label for="slug" class="requerido">SLUG</label>
					<input class="form-control" placeholder="Slug" required="required" id="slug" name="slug" type="text" value="">
				</div>
			@endif

			{!! $Noticias->generate(['categoria_id']) !!}

			<div class="form-group col-md-12">
				<div class="example example_typeahead">
					<div class="bs-example">
						<label for="etiquetas" >Etiquetas</label>
						<input type="text" id="etiquetas" class="form-control" data-role="tagsinput" multiple name="etiquetas" value=""/>
					</div>
				</div>
			</div>

			<div class="col-md-12"></div>

			<div class="form-group col-xs-12">
				<label for="contenido_html">Contenido </label>
				<input id="contenido_html" name="contenido_html" type="hidden" />
				<textarea  placeholder="Contenido de la noticia" id="contenido" class="form-control" required="required"></textarea>
			</div>

			<div class="form-group col-xs-12">
				<label for="resumen">Resumen </label>
				<textarea id="resumen" name="resumen" class="form-control" placeholder="Resumen de la Noticia" required="required"></textarea>
			</div>
			
			<input type="hidden" name="archivos" id="archivos">
		{!! Form::close() !!}

		<div class="col-md-12">
			<form id="fileupload" action="" method="POST" enctype="multipart/form-data">
				<div class="row fileupload-buttonbar">
					<div class="col-lg-7">
						<span class="btn btn-success fileinput-button">
							<i class="fa fa-plus"></i>
							<span>Agregar Archivos...</span>
							<input type="file" name="files[]" multiple>
						</span>
						<button type="submit" class="btn btn-primary start">
							<i class="fa fa-upload"></i>
							<span>Iniciar Carga</span>
						</button>
						<button type="reset" class="btn btn-warning cancel">
							<i class="fa fa-times-circle"></i>
							<span>Cancelar Carga</span>
						</button>
						<button type="button" class="btn btn-danger delete">
							<i class="fa fa-trash"></i>
							<span>Eliminar</span>
						</button>
						<input type="checkbox" class="toggle">
						<span class="fileupload-process"></span>
					</div>
					<div class="col-lg-5 fileupload-progress fade">
						<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar progress-bar-success" style="width:0%;"></div>
						</div>
						<div class="progress-extended">&nbsp;</div>
					</div>
				</div>
				<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
			</form>
		</div>
	</div>

<div id="editar_imagen" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Editar Imagen</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="contImagen" class="col-md-7">
						<img src="" class="img-responsive" style="width: 100%;" />
					</div>
					<div class="col-md-5">
						<label for="descripcion">Descripci&oacute;n </label>
						<textarea id="descripcion" name="descripcion" style="width: 100%;"></textarea>

						<label for="leyenda">Leyenda </label>
						<textarea id="leyenda" name="leyenda" style="width: 100%;"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button id="btn_guardar_imagen" type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>
@endsection

@push('css')
<style>
.bootstrap-tagsinput{
	width: 100%;
}
</style>
@endpush

@push('js')
	<!-- The template to display files available for upload -->
	<script id="template-upload" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr data-id="{%=file.id%}" class="template-upload fade">
				<td style="width: 120px;">
					<span class="preview"></span>
				</td>
				<td style="width: 300px;">
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td>
					<p class="size">Procesando...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
						<div class="progress-bar progress-bar-success" style="width:0%;"></div>
					</div>
				</td>
				<td style="width: 240px;">
					{% if (!i && !o.options.autoUpload) { %}
						<button class="btn btn-primary start" disabled>
							<i class="fa fa-upload"></i>
							<span>Iniciar</span>
						</button>
					{% } %}
					{% if (!i) { %}
						<button class="btn btn-warning cancel">
							<i class="fa fa-times-circle"></i>
							<span>Cancelar</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr data-id="{%=file.id%}" class="template-download fade">
				<td style="width: 120px;">
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
							<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">
							<img width="85px" height="60px" src="{%=file.thumbnailUrl%}"></a>
						{% } %}
					</span>
				</td>
				<td colspan="2">
					<p>
								<b>Leyenda:</b> <span class="leyenda">{%=file.data.leyenda%}</span>
					</p>
					{% if (file.error) { %}
						<div><span class="label label-danger">Error</span> {%=file.error%}</div>
					{% } %}
				</td>
				<td style="width: 240px;">
					{% if (file.deleteUrl) { %}
						<button class="btn btn-info" data-url="{%=file.url%}">
							<i class="fa fa-pencil"></i>
							<span>Editar</span>
						</button>
						<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							<i class="fa fa-trash"></i>
							<span>Eliminar</span>
						</button>
						<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
						<button class="btn btn-warning cancel">
							<i class="fa fa-times-circle"></i>
							<span>Cancelar</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
	</script>
@endpush
