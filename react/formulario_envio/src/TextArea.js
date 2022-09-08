import React from 'react';

class TextArea extends React.Component {
    render() {
        return (
            <div className={this.props.clase}>
                <label>{this.props.titulo}:</label>
                <textarea id={this.props.id} name={this.props.id} className="form-control" required></textarea>
            </div>
        );
    }
}

export default TextArea;