import React from 'react';

class InputText extends React.Component {
    render(){
    return (
        <div class="">
            <label>
                {this.props.titulo}: <input type={this.props.tipo} id={this.props.id} name={this.props.id} className="my-3" />
            </label>
        </div>
    );
    }
}

export default InputText;