@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
 	@include('base::partials.botonera')
	@include('base::partials.ubicacion', ['ubicacion' => ['Inbox']])
@endsection

@section('content')
	<div class="row">
		<div class="col-md-1 col-xs-1 col-lg-1"></div>
		<div class="col-md-10 col-xs-9 col-lg-10">
			
			<div class="panel-group accordion" id="accordion3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
								<center>
									<center><h2  class="panel-title">¿Alérgico o Intolerante a algún alimento?</h2></center>
								</center> 
							</a>
						</h4>
					</div>
					<div id="collapse_3_1" class="panel-collapse in">
						<div class="panel-body" style="overflow: auto;max-height: 300px;">
							<p>Es diferente ser intolerante o ser alérgico a uno o varios alimentos a pesar de que comparten similitudes, como que provocan efectos nocivos en el organismo a causa de la ingesta de determinados alimentos.</p>
							<p>Para iniciar vamos a definir los conceptos y luego describir cuales son los signos para poder responder nuestra pregunta. </p> 
							<p>La intolerancia es la incapacidad de consumir ciertos alimentos o nutrientes sin efectos adversos sobre la salud cuando algún alimento no es asimilado por el organismo, debido a carencia de enzimas, metabólica o digestiva. </p>
							<p>La alergia alimentaria se produce como consecuencia de una reacción del sistema inmunológico (ó defensivo) del niño o adulto que reacciona frente a determinadas sustancias, presentes en ciertos alimentos, generando una serie de síntomas que pueden ser desde leves hasta muy graves.  </p>
							<p>A diferencia de las alergias donde los síntomas aparecen inmediantamente tras tomar el alimento, las manifestaciones de intolerancia pueden aparecer hasta 72 horas después de haber ingerido el alimento y en el caso de la leche de vaca hasta 1mes después. </p>
							<h4>Los síntomas de intolerancia son:</h4>
							<ul>
								<li type="circle">Digestión pesada</li>
								<li type="circle">Diarrea</li>
								<li type="circle">Estreñimiento</li>
								<li type="circle">Gases</li>
								<li type="circle">Dolor Abdominal</li>
								<li type="circle">Distensión abdominal</li>
								<li type="circle">Hinchazón de estomago</li>
								<li type="circle">Vómitos</li>
								<li type="circle">Picor o excema</li>
								<li type="circle">Dolor articular</li>
								<li type="circle">Pérdida de peso</li>
								<li type="circle">Deficiencia de peso</li>
							</ul>

							<h4>Aunque existen muchas intolerancias alimentarias, las más frecuentes son:</h4>
							<ul>

								<li type="square">
									<p><b>Intolerancia a la lactosa</b>
									(el azúcar de la leche): normalmente, la enzima lactasa, 
									que está presente en el intestino delgado, descompone la 
									lactosa en azúcares más simples (glucosa y galactosa), 
									para que puedan ser absorbidos por el torrente sanguíneo. 
									Cuando la actividad de la enzima es demasiado baja, 
									la lactosa no se puede digerir, y pasa al intestino 
									grueso, donde es fermentada por las bacterias de la 
									flora intestinal. Esto puede provocar síntomas como 
									flatulencia, dolor y diarrea.
									</p>
								</li>
								<li type="square">
									<p>
										<b>Intolerancia al gluten:</b> 
										el gluten está presente en cereales de consumo 
										tan habitual como el trigo, la cebada, el centeno 
										o la avena que se contamina con gluten porque se 
										procesa junto a los otros cereales y en otros menos 
										frecuentes. La enfermedad celíaca es una intolerancia 
										"permanente" que se puede diagnosticar a cualquier edad.
									</p>
								</li>
								<li type="square">
									<p>
										<b>Intolerancia a la sacarosa y a la fructosa:</b> 
										se produce por la ausencia de la enzima llamada sacarasa 
										que hidroliza la fructosa y la sacarosa. Estos azúcares 
										están presentes en frutas y zumos o cereales. 
										Se manifiesta por vómitos, ictericia 
										(coloración amarillenta de piel, escleras y mucosas),
										aumento del tamaño del hígado, irritabilidad y en algunos casos 
										puede manifestarse con convulsiones. Requiere una dieta sin fructosa,
										sacarosa y sorbitol.
									</p>
								</li>
							</ul>

							<p>Por otro lado las reacciones alérgicas suelen presentar las primeras manifestaciones en las dos horas siguientes al consumo del alimento, aunque lo más frecuente es que aparezcan los síntomas en los primeros 30-60 minutos. Estas reacciones pueden implicar a uno o varios órganos, incluidos la piel, el tracto digestivo, el respiratorio y el sistema cardiovascular, la gravedad depende de la respuesta inmunológica del paciente, de la reactividad del órgano afectado y de las características del alérgeno.</p>
							<p>Además, factores externos como la toma de medicamentos antiinflamatorios esteroideos o el consumo de alcohol pueden agravar las reacciones en adultos.</p>
							<h4>Las principales manifestaciones que pueden aparecer son las siguientes. </h4>
							<ul>
								<li type="circle">
									<p>
										<b>Cutáneas:</b> 
										Es la reacción más frecuente. 
										Los pacientes suelen presentar urticaria.
										(erupción en piel tipo rosetas, o erupcion fina)
									</p>
								</li>
								<li type="circle">
									<p>
										<b>Mucosas y faringe:</b>
										Estos síntomas son los segundos más comunes. 
										Las personas  que tienen alergia a los alimentos 
										suelen tener reacciones en la mucosa oral y en la faringe,
										como la rinitis.  En individuos con asma pueden producirse 
										broncoespasmo en el contexto de la anafilaxis (reacciones alérgicas graves),
										este síntoma puede ser muy grave y con frecuencia puede causar la muerte por 
										la reacción alérgica. 	
									</p>
								</li>
								<li type="circle">
									<p>
										<b>Aparato digestivo:</b>
										Por último se encuentran 
										los síntomas relacionados con el aparato digestivo 
										que incluye diarrea, dolor abdominal, vómitos y náuseas. 	
									</p>
								</li>
								<li type="circle">
									<p>
										Otros síntomas son el picor en la boca, la garganta, los ojos, la piel u otra área, dificultad para deglutir, mareo, desmayo, hinchazón de los párpados, la cara, los labios y la lengua o rinorrea. Entre los síntomas de alergia bucal destacan el picor en los labios, la lengua y la garganta y la hinchazón de los labios en determinados casos.
									</p>
								</li>
								
							</ul>
							<h4>Las alergias alimentarias más comunes se presentan después de comer alimentos como:</h4>
							<ul>	
								<li type="square">Los huevos (principalmente niños)</li>
								<li type="square">El pescado (niños mayores y adultos)</li>
								<li type="square">La leche (principalmente niños)</li>
								<li type="square">El maní (personas de todas las edades)</li>
								<li type="square">Los mariscos, como camarón, cangrejo y langosta (personas de todas las edades)</li>
								<li type="square">La soya o soja (principalmente niños)</li>
								<li type="square">Los frutos secos (personas de todas las edades)</li>
								<li type="square">El trigo (principalmente niños)</li>
							</ul>

							<p>SABIA USTED QUE 1 DE CADA 20 BEBES TIENE ALERGIA A LA PROTEINA DE LECHE DE VACA???  EN LACTANTES Y PREESCOLARES ES LA ALERGIA ALIMENTARIA MAS FRECUENTE, ENTRE 2 Y 5%. </p>
							<p>La alergia a la proteína de la leche de vaca (APLV) es una reacción exagerada del sistema inmunitario a una o más de las proteínas presentes en la leche de vaca (principalmente la caseína). </p>
							<p>Para evitar esta reacción es importante no ingerir dichas proteínas, e incluso si el niño recibe solo lactancia materna exclusiva su madre debe excluir lácteos y derivados de leche de vaca de su alimentación. </p>
							<p> Es necesario estar atento, si su bebe presenta síntomas como estreñimiento, diarrea, irritabilidad, reflujo gastroesofagico, vómitos, manchas rojas en la piel, pérdida de peso, quejido, cólico, entre otros.  Estos síntomas pueden estar relacionados a APLV. </p>
							<p>La APLV es común en niños, especialmente en lactantes. Adultos rara vez tienen alergia a la leche de vaca, generalmente asociada a diagnósticos tardíos, falta de inmunoterapia o falla en inmunomodulacion. </p>
							<p>Las señales o síntomas de APLV son uno o más de los siguientes: vómitos, cólico, diarrea, dolor abdominal, sangre en heces, dermatitis (erupción en la piel, descamación, engrosamiento en la piel, mejillas ásperas y hasta pequeñas ampollas), problemas respiratorios (broncoespasmo, rinitis) y pérdida de peso o peso estacionario. Pueden ocurrir después de algunos minutos, horas o días después de la ingestión de leche de vaca o derivados (reacciones tempranas o tardías), de forma persistente o repetitiva. </p>
							<p>El diagnóstico lo hace el médico mediante observación de síntomas, exámenes en sangre  (IgE especifica de leche de vaca, caseína, alfa o betalactoalbumina, IgG, IgG4) o cutáneos (PRICK test) que pueden realizarse, sin embargo son usados en niños mayores de 1 año de edad en vista de la inmadurez del sistema inmunológico en recién nacidos y lactantes menores) , en casos de alergia no mediada por IgE es fundamental el interrogatorio de manifestaciones clínicas y puede ser necesario el estudio endoscópico. Finalmente la respuesta clínica satisfactoria a la exclusión de leche de vaca y sus derivados con posterior reaparición de sintomatología con el desafío o reintroducción de los mismos confirma el diagnóstico. </p>
						</div>
					</div>
				</div>
			</div>
		<b>¿Aún no has adquirido tu paquete de consultas personalizado?</b> Mira los paquetes que tenemos para ti, realizando <a href="{{ url('/backend') }}">clic aquí</a> 
		</br></br>
						<b>Importante:</b> Eliga el paquete de su preferencia y notifique el pago 
						al siguiente correo: <a href="mailto:pagos@marygastro.com.ve">pagos@marygastro.com.ve</a> 
						</br>Una vez realizado el pago y notificado al correo, podrá realizar consultas por este medio.

		</div>

			
		<div class="col-md-1 col-xs-1 col-lg-1"></div>
	</div>
	
	
	<div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Incidencias->generate() !!}
        {!! Form::close() !!}
    </div>
      
@endsection

@push('js')
	<script>
		var casos = "{{intval($casos)}}";
	</script>
@endpush
@push('css')
	<style>
		p {
			text-align: justify;
		}
	</style>
@endpush
