import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import SignUp from './components/SignUp/SignUp';
import TablaUsuarios from './components/Table/Table';
import reportWebVitals from './reportWebVitals';

ReactDOM.render(
  <React.StrictMode>
    <SignUp />
    <TablaUsuarios />
  </React.StrictMode>,
  document.getElementById('root')
);

reportWebVitals();
