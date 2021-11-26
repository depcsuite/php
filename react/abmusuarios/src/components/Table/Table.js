import { useState, useEffect } from 'react';
import { getUsuarios, deleteUser } from '../../services/services';
import { faArrowAltCircleRight, faEdit, faTrashAlt } from '@fortawesome/free-regular-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';

export default function TablaUsuarios() {

    const [usuarios, setUsuarios] = useState([]);

    const useStyles = makeStyles({
        table: {
            maxWidth: 220,
            width: 220,
            marginLeft: 'auto',
            marginRight: 'auto'
        },
    });

    const classes = useStyles();

    const retrieve = async () => {
        const data = await getUsuarios();
        if (data.code === 200) {
            setUsuarios(data.data);
        }
    }

    const eliminarUsuario = async (usuario) => {
        const data = await deleteUser(usuario);
        if (data.code === 200) {
            retrieve();
        }
        alert(data.msg);
    }

    useEffect(() => {
        retrieve();
    }, []);

    return (
        <div
            style={{
                marginTop: 30,
                marginLeft: 'auto',
                marginRight: 'auto',
                justifyContent: 'center',
                textAlign: 'center'
            }}
        >
            <button onClick={() => { retrieve() }}>Actualizar tabla <FontAwesomeIcon icon={faArrowAltCircleRight} /></button>
            <TableContainer component={Paper} style={{ maxWidth: 440, marginRight: 'auto', marginLeft: 'auto', marginTop: 20 }}>
                <Table className={classes.table} size="small" aria-label="a dense table">
                    <TableHead>
                        <TableRow>
                            <TableCell>Editar</TableCell>
                            <TableCell>Eliminar</TableCell>
                            <TableCell align="left">Usuario</TableCell>
                            <TableCell align="left">Nombre</TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {usuarios.map((item) => (
                            <TableRow key={item.usuario}>
                                <TableCell align="left"><FontAwesomeIcon icon={faEdit} /></TableCell>
                                <TableCell align="left"><FontAwesomeIcon icon={faTrashAlt} onClick={() => { eliminarUsuario(item.usuario) }} /></TableCell>
                                <TableCell align="left">{item.usuario}</TableCell>
                                <TableCell align="left">{item.nombre}</TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </TableContainer>
        </div>
    );
}