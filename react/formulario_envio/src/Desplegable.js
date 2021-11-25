import React from 'react';

class Desplegable extends React.Component {
    render() {
    return (
        <div>
            <label>
                {this.props.titulo}:
                    {
                        (this.props.fuente.length === 0) ? (<p>No hay elementos para mostrar</p>) : (
                        <select id={this.props.id} name={this.props.id} >
                            <option disabled selected>Seleccionar</option>
                            {this.props.fuente.map(item => (
                                <option value={item.value}>
                                    {item.nombre}
                                </option>
                            ))}
                        </select>

                        )
                    }
            </label>
        </div>
    );
}
}

export default Desplegable;