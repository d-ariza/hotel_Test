import React, { useState } from 'react';
import axios from 'axios';
import './FloatingLabels.css'; // Importa los estilos de etiquetas flotantes

const HotelForm = ({ hotel = {}, onSave }) => {
    const [nombre, setNombre] = useState(hotel.nombre || '');
    const [direccion, setDireccion] = useState(hotel.direccion || '');
    const [ciudad, setCiudad] = useState(hotel.ciudad || '');
    const [nit, setNit] = useState(hotel.nit || '');
    const [numeroHabitaciones, setNumeroHabitaciones] = useState(hotel.numero_habitaciones || '');

    const handleSubmit = (event) => {
        event.preventDefault();
        const hotelData = { nombre, direccion, ciudad, nit, numero_habitaciones: numeroHabitaciones };

        const request = hotel.id
            ? axios.put(`http://localhost:8000/api/hotels/${hotel.id}`, hotelData)
            : axios.post('http://localhost:8000/api/hotels', hotelData);

        request.then(response => {
            onSave(response.data);
            setNombre('');
            setDireccion('');
            setCiudad('');
            setNit('');
            setNumeroHabitaciones('');
        }).catch(error => console.error(error));
    };

    return (
        <form onSubmit={handleSubmit}>
            <div className="input-container">
                <input
                    type="text"
                    value={nombre}
                    onChange={(e) => setNombre(e.target.value)}
                    placeholder=" "
                    required
                />
                <label>Nombre</label>
            </div>
            <div className="input-container">
                <input
                    type="text"
                    value={direccion}
                    onChange={(e) => setDireccion(e.target.value)}
                    placeholder=" "
                    required
                />
                <label>Dirección</label>
            </div>
            <div className="input-container">
                <input
                    type="text"
                    value={ciudad}
                    onChange={(e) => setCiudad(e.target.value)}
                    placeholder=" "
                    required
                />
                <label>Ciudad</label>
            </div>
            <div className="input-container">
                <input
                    type="text"
                    value={nit}
                    onChange={(e) => setNit(e.target.value)}
                    placeholder=" "
                    required
                />
                <label>NIT</label>
            </div>
            <div className="input-container">
                <input
                    type="number"
                    value={numeroHabitaciones}
                    onChange={(e) => setNumeroHabitaciones(e.target.value)}
                    placeholder=" "
                    required
                />
                <label>Número de habitaciones</label>
            </div>
            <button type="submit" className="btn btn-primary">Guardar</button>
        </form>
    );
};

export default HotelForm;
