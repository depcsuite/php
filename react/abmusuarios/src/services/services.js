export const setUserData = async (nombre, usuario, pass) => {
    const response = await fetch(`http://192.168.64.4/php/api/abmusuarios/insertUser.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify({
            nombreUsuario: nombre,
            user: usuario,
            password: pass
        })
    });
    var data = await response.json();
    return data;
}

export const getUsuarios = async () => {
    const response = await fetch(`http://192.168.64.4/php/api/abmusuarios/getUsers.php`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        }
    });
    var data = await response.json();
    return data;
}

export const deleteUser = async (usuario) => {
    const response = await fetch(`http://192.168.64.4/php/api/abmusuarios/deleteUser.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify({
            user: usuario
        })
    });
    var data = await response.json();
    return data;
}