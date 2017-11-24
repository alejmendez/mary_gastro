Saludos, 
<b>{{ $request->nombre }}</b> 
intenta contactarse con nosotros, 
dejó el siguiente mensaje:
<p>{{ $request->mensaje }}</p><br /><br />

Contacto:<br />
Correo: <b>{{ $request->email }}</b> <br />
Telefono: <b>{{ $request->telefono }}</b> <br />