import 'bootstrap/dist/css/bootstrap.min.css'; // Importa Bootstrap CSS
import './App.css'; // Importa el archivo CSS personalizado
import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import App from './App';
import reportWebVitals from './reportWebVitals';

const container = document.getElementById('root');
const root = createRoot(container); // Aquí usamos createRoot que vienbe de la 18

root.render(
    <BrowserRouter future={{ v7_startTransition: true, v7_relativeSplatPath: true }}> {//esto habilita las nuevas etiqeuetas de la version 19... no veo cambios significativos
        }
        <App />
    </BrowserRouter>
);

reportWebVitals();
