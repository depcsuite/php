import React from 'react';

class InputText extends React.Component {
    render(){
    return (
        <div className={this.props.clase}>
            <label>{this.props.titulo}:</label>
            <input type={this.props.tipo} id={this.props.id} name={this.props.id} className="form-control" required/>
        </div>
    );
    }
}

export default InputText;