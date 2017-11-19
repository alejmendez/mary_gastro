@extends('pagina::layouts.default')

@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
    <div class="auto-container">
        <h1>Testimonios</h1>
        <h3 class="styled-font">La opinión de mis pacientes es muy importante</h3>
    </div>
</section>

<!--Page Info-->
<section class="page-info">
    <div class="auto-container clearfix">
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix"><li><a href="{{ url('/') }}">Inicio</a></li><li>¿Quién es Mary Gastro?</li></ul>            </div>
    </div>
</section>

<!--Testimonials Section-->
<section class="testimonials-section">
    <div class="auto-container">
        
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>Testimonios de mis Pacientes</h2>
                    <div class="separator"></div>
                </div>                 
            </div>
        </div>
        
        <!--Testimonial 0-->
        <div class="slide-item">
            <div class="inner-box">
                <div class="slide-header">
                    <figure class="author-thumb"><img width="90" height="90" src="{{ asset('public/img/author-thumb-0.jpg') }}" class="attachment-90x90 size-90x90 wp-post-image" alt="author-thumb-0" srcset="{{ asset('public/img/author-thumb-0.jpg') }} 90w, {{ asset('public/img/author-thumb-2-75x75.jpg') }} 75w" sizes="(max-width: 90px) 100vw, 90px" /></figure>
                    <h3>Valery</h3>
                    <div class="designation" style="font-size: 24px">Diagnóstico acertado</div>
                </div>
                <div class="slide-content">
                <p>Todo inicio aproximadamente a dos meses del nacimiento de nuestra Pequeña Valery, una diarrea extraña, en oportunidades
                 con sangre, trazas de leche y moco. A los días siguientes un llanto incontrolable, apretaba sus manitos metiendolas a su 
                 boca con desespero, tiraba de sus cabellos, su carita roja de tanto llanto, presencia de vómitos, erupcion en su piel, 
                 pálida, no ganaba peso ni talla. En principio, todo para el pediatra era normal, luego el diagnóstico del siguiente pediatra
                 amibiasis, cólicos, reflujo, etc. Inicio Tratamientos con antibióticos, suspensión de la lactancia materna por un período de
                 tiempo, inclusión y cambio de fórmulas, parecía un tratamiento de ensayo y error ya que antibióticos no dejaban de salirse de
                 las indicaciones solo que cambiaban los nombres y presentaciones. Allí el cuadro empezó a complicarse más, a tal grado que ya
                 eran 9 pediatras que habíamos visitado desesperados, hasta que al llegar a uno de ellos con cara muy seria pero segura nos 
                 dijo; a su hija hay que remitirla urgente a una consulta especializada no más experimento sin certeza, no más diagnósticos 
                 errados, nos apoyo haciendo el enlace con la Dra. Maryraida y desde esa llamada Dios empezó a conducir nuestro camino, 
                 inmediatamente viajamos a la Ciudad de Bolívar donde encontraríamos a esa Doctora que bien la llamaron "Especialista" 
                 ciertamente así lo fue. El diagnóstico Gastropatia Inflamatoria, enterocolopatia inflamatoria, ectasia renal e Hipercalciuria
                 e intolerancia alimentaria, a partir de allí inicio nuestro proceso de atención y monitoreo para con el tratamiento y cuidados
                 de nuestra Pequeña, no fue fácil el transitar y los días, evaluaciones, exámenes de laboratorio, videoendoscopia que sumo al 
                 diagnóstico Gastritis crónica, hemorragia y duodenitis inespecifica a correlaciónar con alimentación a través de una biopsia.
                 A todo este diagnóstico, la evolución y tratamientos fueron lentos pero ACERTIVOS, seguimos sus indicaciones al pie de la 
                 letra, siempre nos acompaño en todo momento, hoy agradecemos a Dios grandemente haber llegado a su consulta, desde ese día
                 hasta el Sol de hoy encontramos una guía, rayitos de luz, esperanza, apoyo, Fe, optimismo, paciencia, una super y gran
                 doctora, amiga, atenta e incondicional , persona 1000% humana y carismática, siempre palpito en nosotros ese positivismo
                 que al llegar a su consulta nos invadía, con esas palabras que retiraban y cancelaba todo pensamiento NEGATIVO "TRANQUILOS
                 QUE EL EQUIPO GANA", ciertamente así fue. Gracias Doctorisima por enseñarnos tanto, no sólo de un diagnóstico si no por el 
                 acompañamiento para con el crecimiento, fortalecimiento y recuperación de Valery. </p>

                <b><i>I LOVE YOU Familia Ramirez Rendon.</i></b></div>
            </div>
        </div><!--End testimonial 0-->

        <!--Testimonial 1-->
        <div class="slide-item">
            <div class="inner-box">
                <div class="slide-header">
                    <figure class="author-thumb"><img width="90" height="90" src="{{ asset('public/img/author-thumb-1.jpg') }}" class="attachment-90x90 size-90x90 wp-post-image" alt="author-thumb-1" srcset="{{ asset('public/img/author-thumb-1.jpg') }} 90w, {{ asset('public/img/author-thumb-1-75x75.jpg') }} 75w" sizes="(max-width: 90px) 100vw, 90px" /></figure>
                    <h3>Yraimis Poueriet</h3>
                    <div class="designation" style="font-size: 24px">Intoleracia a la caseina</div>
                </div>
                <div class="slide-content">
                <p>Mi nombre es Yraimis Poueriet, soy madre de esta princesa llamada Ashley Nazareth, y la verdad es que conocer a la Doc
                Maryraida fue una bendicion para nuestras vidas, ya que mi hija padecia de una patologia bien compleja que 10 pediatras
                no pudieron detectar, era intolerante a la caseina (La proteina de la leche de vaca), y tenia un cruce alergico con la 
                soya. El cual gracias a nuestra Doctora y a mi cumplimiento del tratamiento, hoy por hoy tengo una niña sana inmune a 
                todo, y muy feliz gracias a Dios, y a nuestro angel terrenal, como lo es nuestra doctora!</p>
                <b><i>Bendiciones infinitas</i></b></div>
            </div>
        </div><!--End testimonial 1-->

        <!--Testimonial 2-->
        <div class="slide-item">
            <div class="inner-box">
                <div class="slide-header">
                    <figure class="author-thumb"><img width="90" height="90" src="{{ asset('public/img/author-thumb-2.jpg') }}" class="attachment-90x90 size-90x90 wp-post-image" alt="author-thumb-1" srcset="{{ asset('public/img/author-thumb-2.jpg') }} 90w, {{ asset('public/img/author-thumb-2-75x75.jpg') }} 75w" sizes="(max-width: 90px) 100vw, 90px" /></figure>
                    <h3>Familia Gallego Jaramillo</h3>
                    <div class="designation" style="font-size: 24px">Diagnóstico acertado</div>
                </div>
                <div class="slide-content">
                <p>Dra. Maryraida Canónico; un ángel enviado por Dios para Cesar Gallego Jaramillo nuestro hijo, la odisea como padres
                comenzó a los 3 días de nacido el niño, con una diarrea que todos los pediatras me decían que era "normal", para aquel 
                entonces esa era la palabra mas odiada por nosotros, vivíamos a diario en el pediatra, exámenes y mas! exámenes, 
                tratamientos iban y venían pero resultados positivos nada!!, mi instinto de madre me decía que NO era normal, entre ese
                ir y venir de pediatras de los cuales una hasta me llamo "ignorante", fuimos a parar donde una dermatóloga, y es que ya
                no era solo la diarrea, como consecuencia se le genero un problema en la piel, fue la dermatóloga quien me explica que
                tooodos! los problemas del niño son de origen  alimenticio, y me remite con la Gastroenteróloga Infantil, al asistir 
                a la consulta ya hubo un diagnostico mas claro una gran! colitis, la Dra. le puso su tratamiento, aparte de dietas para
                ambos, las cosas mejoraron un 100%, sin embargo la diarrea regreso al tiempo con mas intensidad de hospitalización y todo,
                a este punto mi esposo NO quería nada! con la Dra. Maryraida no la quería ni ver jajajajaja!!!, que nos cambiáramos de Dra.
                pero yo tenia Fe en mi Dios y es que era algo inexplicable algo que me decía "ni se te ocurra cambiar a esta Dra.",
                fueron días terribles en esa clínica. Luego de otros exámenes, la Dra. me dice Cesar es "CELIACO", OK!, en este punto me 
                sentí terrible por que jamás había escuchado esa palabra, solo me puse a llorar, pero la Dra. con un gran amor, paciencia, 
                nobleza me explico tipo escuelita que era la celiaquía, nos facilito un libro para leer sobre esta condición, la comprobamos 
                con examen genético y todo y pues las cosas fueron mejorando con una alimentación LIBRE DE GLUTEN,  Hoy por hoy gracias a Dios 
                y a la Dra. Cesar es un niño SANO, la Dra. es parte de nuestro corazón de nuestras vidas. En vacaciones se enfermo y me decía 
                "esta Dra. no me gusta, a mi me gusta la Dra. de Venezuela", ella se ha ganado ese lugar en el corazón de mi hijo y allí va 
                estar un buen rato.</p>

                <b><i>Eliana Jaramillo, Carlos Gallego</i></b></div>
            </div>
        </div><!--End testimonial 2-->


        <!--Testimonial 3-->
        <div class="slide-item">
            <div class="inner-box">
                <div class="slide-header">
                    <figure class="author-thumb"><img width="90" height="90" src="{{ asset('public/img/author-thumb-3.jpg') }}" class="attachment-90x90 size-90x90 wp-post-image" alt="author-thumb-1" srcset="{{ asset('public/img/author-thumb-3.jpg') }} 90w, {{ asset('public/img/author-thumb-3-75x75.jpg') }} 75w" sizes="(max-width: 90px) 100vw, 90px" /></figure>
                    <h3>Orlenis Pulido</h3>
                    <div class="designation" style="font-size: 24px">Mi Dra. para el hogar</div>
                </div>
                <div class="slide-content">
                <p>Agradecemos a Dios porque existen médicos profesionales  con  excelente calidad  como la Dra. Maryraida. 
                    Somos testigos de la excelencia en el manejo de pacientes con multiples alergias alimentarias.
                    Nuestra experiencia con la Dra. ha sido maravillosa. Ya que cuando nació nuestra primera hija, con tan sólo días de nacida
                    empezó a tratarla. Presentó reflujo gastroesofagico y eran tanto los episodios
                    que ya no dormíamos ni de día ni de noche. Fue un cuadro clínico complicado,  tenia mucho temor de ver afectada la salud
                    de nuestra hija y de no saber que sucedía. Gracias a la atención de la Dra. nuestra vida cambió por completo,  nos enseñó
                    muchísimas cosas y lo más importante es que vimos la evolución de inmediato. Apliqué todas sus recomendaciones, cumpliendo
                    con el tratamiento y la dieta libre de caseina,  la combinación perfecta  para el éxito. Hoy en dia ha superado las 
                    alergias casi por completo. Toda la familia está feliz con los resultados.</p>  
                    <b><i>Infinitas Gracias Dra. Bendiciones.....</i></b></div>
            </div>
        </div><!--End testimonial 3-->

        
        </div>
        
    </div>
</section>   

<section class="call-to-action">
    <div class="container">
        <div class="row">
    	    <div class="col-md-8 col-sm-8 text-right m-text-center">
                <h1 style="color:#fff">¿También quieres dejar tu testimonio?</h1>
            </div>
             <div class="col-md-4 col-sm-4 m-text-center">
                <a class="btn btn-white">Comenta</a> 
            </div>
        </div>
    </div>
</section>	

@endsection

@push('css')


<style>
section {background:#6BE06B; padding:40px 0;}

.btn {
    border-radius: 5px;
    margin: 21px 0 0 0;
    font-weight:700;
}

.btn.btn-white {
    background: #fff;
    color: #666;
    border-bottom: 4px solid #ddd;
}

@media (max-width: 768px) {
    .m-text-center {text-align:center;}
    .call-to-action h1{font-size:20px;}
}
@media (max-width: 1024px) {
    .m-text-center {text-align:center;}
    .call-to-action h1{font-size:25px;}
}

</style>

@endpush