export const obtenerAsuntos = async() => {
    const response = await fetch("http://192.168.64.4/api//formulario_envio/obtenerAsuntos.php");
    const data = await response.json();
    return data;
}
