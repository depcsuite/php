import React from 'react';

class Desplegable extends React.Component {
    render() {
    return (
        <div className={this.props.clase}>
            <label>{this.props.titulo}:  </label>
                    {
                        (this.props.fuente.length === 0) ? (<p>No hay elementos para mostrar</p>) : (
                    <select id={this.props.id} name={this.props.id} className="form-control" required>
                            <option disabled selected>Seleccionar</option>
                            {this.props.fuente.map(item => (
                                <option value={item.value}>
                                    {item.nombre}
                                </option>
                            ))}
                        </select>

                        )
                    }
          
        </div>
    );
}
}

export default Desplegable;