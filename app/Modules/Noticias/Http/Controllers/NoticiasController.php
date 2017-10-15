<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//Dependencias
use DB;
use Validator;
use Image;
use Yajra\Datatables\Datatables;
use FTP;
use Carbon\Carbon;

use Illuminate\Http\Request;

//Request
use marygastro\Modules\Noticias\Http\Requests\noticiasRequest;

//Modelos
use marygastro\Modules\Noticias\Models\Noticias;
use marygastro\Modules\Noticias\Models\Noticias_Categorias;
use marygastro\Modules\Noticias\Models\Categorias;
use marygastro\Modules\Noticias\Models\Imagenes;



use marygastro\Modules\Noticias\Http\Controllers\Controller;

class NoticiasController extends Controller
{
    public $js = ['Noticias'];
    public $librerias = [
        'alphanum',
        'maskedinput',
        'datatables',
        'ckeditor',
        'jquery-ui',
        'jquery-ui-timepicker',
        'file-upload',
        'jcrop',
        'bootstrap-select'
    ];

    public $perfiles_publicar = [1];


    public function index(){
        return $this->view('noticias::Noticias', [
            'Noticias'=> new Noticias()
        ]);

    }

    public function buscar(Request $request, $id =0){
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta().'/destruir')) {
            $rs = Noticias::withTrashed()->find($id);
        }else {
            $rs = Noticias::find($id);
        }
        $url = $this->ruta();
        $url=substr($url,0,strlen($url)-7);
        if ($rs) {
            $imgArray=[];
            $imgs = Imagenes::where('noticias_id', $id)->get();

            foreach ($imgs as $img) {
                $id_archivo=str_replace ('/','-', $img->archivo);
                $name=substr($id_archivo, strrpos($id_archivo,'/')+1);
                $imgArray[]=[
                    'id'=>$id_archivo,
                    'name'=>$name,
                    'url'=>url('public/archivos/noticias/'.$img->archivo),
                    'thumbnailUrl'=>url('public/archivos/noticias/'.$img->archivo),
                    'deleteType'=>'DELETE',
                    'deleteUrl'=>url($url.'/eliminarimagen'.$id_archivo),
                    'data'=>[
                        'cordenadas'=>[],
                        'leyenda'=>$img->leyenda,
                        'descripcion'=>$img->descripcion
                    ]
                ];
            }

            $categoArray = [];
            $categorias = Noticias_Categorias::select('categoria_id')->where('noticia_id', $id)->get();

            foreach ($categorias as $key => $categoria) {
                $categoArray[]=$categoria['categoria_id'];
            }

            // dd($respuesta['categoria_id']->toArray());

            $respuesta = array_merge($rs->toArray(),[
                's'=>'s',
                'msj'=>trans('controller.buscar'),
                'categoria_id' => $categoArray,
                'files'=>$imgArray
            ]);

            return $respuesta;
        }
        return trans('controller.nobuscar');
    }

    public function categorias() {
        return Categorias::pluck('nombre', 'id');
    }

    public function data($request){
        if ($this->puedePublicar() && $request->input(['published_at']) != '') {
            $data=$request->all();
        }else {
            $data=$request->except(['published_at']);
        }
        $data['contenido']= strip_tags($data ['contenido_html']);
        // $data['app_usuario_id'] = auth()->user()->id;
        // $data['slug'] = str_slug($data['titulo'],'-');

        return $data;
    }

    protected function guardar_etiquetas($request, $id) {
		Noticias_Categorias::where('noticia_id', $id)->delete();
		foreach ($request['categoria_id'] as $categoria) {
			Noticias_Categorias::create([
				'noticia_id' => $id,
				'categoria_id' => $categoria,
			]);
		}
        // dd($categorias);
	}

    public function guardar(noticiasRequest $request,$id=0){

       DB::beginTransaction();
       try {
           $data = $this->data($request);
           $archivos = json_decode($request->archivos);

           if ($id === 0) {
               $Noticias = Noticias::create($data);
               $id = $Noticias->id;
           }else {
               if (empty($archivos)) {
                   unset($data['published_at']);
               }
               $Noticias = Noticias::find($id)->update($data);
           }

           $this->guardar_etiquetas($request, $Noticias->id);
           $this->guardarImagenes($archivos, $id);


           //$this->procesar_permisos($request, $id);
       } catch (QueryException $e) {
           DB::rollback();
           return $e->getMessage();
       } catch (Exception $e) {
           DB::rollback();
           return $e->errorInfo[2];
       }

       DB::commit();
       return ['s' => 's', 'msj' => trans('controller.incluir')];

    }

    protected function getRuta() {
        return date('Y') . '/' . date('m') . '/';
    }

    protected function guardarImagenes($archivos,$id=0){
        foreach ($archivos as $archivo => $data) {
            if (!preg_match("/^(\d{4})\-(\d{2})\-([0-9a-z\.]+)\.(jpe?g|png)$/i", $archivo)) {
                continue;
            }


            $archivo = str_replace('-','/',$archivo);
            $imagen = Image::make(public_path('archivos/noticias/' . $archivo));
            $imagenes=Imagenes::firstOrNew(array('archivo'=>$archivo));
            $imagenes->fill([
                'noticias_id'=>$id,
                'tamano'=>$imagen->width().'x'.$imagen->height(),
                'leyenda'=>$data->leyenda,
                'descripcion'=>$data->descripcion
            ]);
            $imagenes->save();
        }
    }

    public function eliminar(Request $request, $id=0){
        try{
            $rs=Noticias::destroy($id);
        }catch (Exception $e){
            return $e->errorInfo[2];
        }
        return ['s'=>'s', 'msj'=>trans('controller.eliminar')];
    }

    public function restaurar(Request $request, $id=0){
        try {
            Noticias::withTrashed()->find($id)->restore();
        }catch(Exception $e){
            return $e->errorInfo[2];
        }
        return ['s'=>'s', 'msj'=>trans('controller.restaurar')];
    }

    public function destruir(Request $request, $id=0){
        try {
			Noticias::withTrashed()->find($id)->forceDelete();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function eliminarImagen(Request $request, $id=0){
        $id = str_replace('-', '/', $id);
		try {
			// \File::delete(public_path('img/noticias/' . $id));
			$rs = Imagenes::destroy($id);
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.eliminar')];
    }

    public function subir(Request $request) {
        $validator=Validator::make($request->all(),[
            'files.*' => [
                'required',
                'mimes:jpeg,jpg,png'
            ],
        ]);

        if ($validator->fails()) {
            return 'Error de Validación';
        }

        $files = $request->file('files');
        $url = $this->ruta();
        $url = substr($url, 0, strlen($url) - 6);

        $rutaFecha = $this->getRuta();
        $ruta = public_path('archivos/noticias/' . $rutaFecha);

        $respuesta = array(
            'files' => array(),
        );

        foreach ($files as $file) {
            do {
                $nombre_archivo = $this->random_string() . '.' . $file->getClientOriginalExtension();
            } while (is_file($ruta . $nombre_archivo));

            $id = str_replace('/', '-', $rutaFecha . $nombre_archivo);

            $respuesta['files'][] = [
                'id' => $id,
                'name' => $nombre_archivo,
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                //'url' => url('imagen/small/noticias/' . $rutaFecha . $nombre_archivo),
                'url' => url('public/archivos/noticias/' . $rutaFecha . $nombre_archivo),
                'thumbnailUrl' => url('public/archivos/noticias/' . $rutaFecha . $nombre_archivo),
                'deleteType' => 'DELETE',
                'deleteUrl' => url($url . '/eliminarimagen/' . $id),
                'data' => [
                    'cordenadas' => [],
                    'leyenda' => '',
                    'descripcion' => ''
                ]
            ];

            $mover = $file->move($ruta, $nombre_archivo);
        }

        return $respuesta;
    }

    protected function random_string($length = 10) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function estatus(){
        return Estatus::pluck('nombre', 'id');
    }

    public function categoria() {
        return categorias::pluck('nombre','id');
    }

    public function puedePublicar(){
        return strtolower(auth()->user()->super) === 's' || $this->permisologia('publicar');
    }

    // protected function guardarEtiquetas($request, $id) {
	// 	noticias_etiquetas::where('noticias_id', $id)->delete();
	// 	foreach ($request['etiquetas_id'] as $etiqueta) {
	// 		noticias_etiquetas::create([
	// 			'noticias_id' => $id,
	// 			'etiquetas_id' => $etiqueta,
	// 		]);
	// 	}
	// }

    public function datatable() {
        $sql = Noticias::select([
            'noticias.titulo', 'noticias.resumen', 'noticias.id'
        ]);

         return Datatables::of($sql)->setRowId('id')->make(true);

    }






}
