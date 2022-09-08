import React, { useState, useEffect } from 'react';
import InputText from './InputText.js';
import Desplegable from './Desplegable.js';
import TextArea from './TextArea.js';
import { obtenerAsuntos } from "./services"; //Toma por defecto el index.js

function Formulario() {

    const [asuntos, setAsuntos] = useState([]);

    useEffect(() => { // Lo ejecuta cuando carga la aplicacion la primera vez
        (async () => {
            const data = await obtenerAsuntos(); // Accedo a los datos que vienen del json
            setAsuntos(data);
        })()
    }, []);

    return (
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class='text-center py-5'>Formulario de contacto</h1>
                </div>
            </div>
            <form method="POST" action="http://192.168.64.4/php/api/formulario_envio/guardarFormulario.php">

                <div class="row">
                    <InputText id="txtNombre" titulo="Nombre" tipo="text" clase="col-6 mt-3" />
                    <InputText id="txtTelefono" titulo="Telefono" tipo="text" clase="col-6 mt-3" />
                    <InputText id="txtCorreo" titulo="Correo" tipo="email" clase="col-6 mt-3" />
                    <Desplegable id="lstAsunto" titulo="Asunto" fuente={asuntos} clase="col-6 mt-3" />
                    <TextArea id="txtMensaje" titulo="Mensaje" clase="col-6 my-3" />
                </div>
                <div className='col-12 text-center'>
                    <button type="submit" className="btn btn-primary mt-3 px-5" >Enviar</button>
                </div>
            </form>
        </div >
    );
}
export default Formulario;
