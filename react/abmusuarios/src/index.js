import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import Formulario from './components/Formulario/Formulario';
import TablaUsuarios from './components/Table/Table';
import reportWebVitals from './reportWebVitals';

ReactDOM.render(
  <React.StrictMode>
    <Formulario />
    <TablaUsuarios />
  </React.StrictMode>,
  document.getElementById('root')
);

reportWebVitals();
