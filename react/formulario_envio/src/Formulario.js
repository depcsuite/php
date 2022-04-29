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
            <div>
                <h1>Formulario de contacto</h1>
                <form method="POST" action="http://192.168.64.4/php/api/formulario_envio/guardarFormulario.php">
                    <InputText id="txtNombre" titulo="Nombre" tipo="text" />
                    <InputText id="txtTelefono" titulo="Telefono" tipo="text" />
                    <InputText id="txtCorreo" titulo="Correo" tipo="email" />
                    <Desplegable id="lstAsunto" titulo="Asunto" fuente={asuntos} />
                    <TextArea id="txtMensaje" titulo="Mensaje"/>
                    <button type="submit" className="my-5 btn-lg btn-primary" >Enviar</button>
                </form >
            </div>
        );
}
export default Formulario;
