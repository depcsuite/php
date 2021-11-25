import React from 'react';

class TextArea extends React.Component {
    render() {
        return (
            <div>
                <label> {this.props.titulo} <textarea id={this.props.id} name={this.props.id}></textarea>
                </label>
            </div>
        );
    }
}

export default TextArea;