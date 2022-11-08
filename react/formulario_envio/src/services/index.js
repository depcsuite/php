export const obtenerAsuntos = async() => {
    const response = await fetch("http://127.0.0.1:8000/obtenerAsuntos");
    const data = await response.json();
    return data;
}
