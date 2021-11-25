import { useEffect, useState } from 'react';
import Title from '../Card/Card';
import { setUserData } from '../../services/services';
import Estilos from '../SignUp/style.module.css';

function SignUp(props) {

    const [nombre, setNombre] = useState('');
    const [usuario, setUsuario] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = async () => {
        try {
            const data = await setUserData(nombre, usuario, password);
            alert(data.msg);
            if (data.code === 200) {
                setNombre('');
                setUsuario('');
                setPassword('');
            }
        } catch (error) {
            alert(error);
        }
    }

    const handleChange = (e) => {
        setNombre(e.target.value);
    }

    const handleChangeUser = (e) => {
        setUsuario(e.target.value);
    }

    const handleChangePassword = (e) => {
        setPassword(e.target.value);
    }

    return (
        <div style={styles.container}>
            <Title />
            <div style={styles.form}>
                <div style={styles.row}>
                    <label>Nombre *</label>
                    <input type="text" onChange={handleChange} value={nombre}></input>
                </div>
                <div className={Estilos.px3} style={styles.row}>
                    <label>Usuario *</label>
                    <input type="text" onChange={handleChangeUser} value={usuario}></input>
                </div>
                <div style={styles.row}>
                    <label>Contraseña *</label>
                    <input type="password" onChange={handleChangePassword} value={password}></input>
                </div>
                <div style={{ textAlign: 'center', marginTop: 17 }}>
                    <button onClick={handleSubmit}>Registrar</button>
                </div>
            </div>
        </div>
    );
}

const styles = {
    container: {
        backgroundColor: '#28527a',
        textAlign: 'center',
        marginRight: '30%',
        marginLeft: '30%',
        marginTop: '5%',
        paddingTop: 10,
        paddingBottom: 40,
        borderRadius: 50,
    },
    form: {
        width: '50%',
        margin: 'auto',
        textAlign: 'left'
    },
    row: {
        color: 'white',
        fontWeight: 'bold',
        display: 'grid'
    }
};

export default SignUp;