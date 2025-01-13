import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Accordion } from 'react-bootstrap';

const HotelList = () => {
    const [hoteles, setHoteles] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8000/api/hotels')
            .then(response => setHoteles(response.data))
            .catch(error => console.error(error));
    }, []);

    return (
        <Accordion>
            {hoteles.map(hotel => (
                <Accordion.Item eventKey={hotel.id} key={hotel.id}>
                    <Accordion.Header>{hotel.nombre}</Accordion.Header>
                    <Accordion.Body>
                        <p>Dirección: {hotel.direccion}</p>
                        <p>Ciudad: {hotel.ciudad}</p>
                        <p>NIT: {hotel.nit}</p>
                        <p>Número de habitaciones: {hotel.numero_habitaciones}</p>
                    </Accordion.Body>
                </Accordion.Item>
            ))}
        </Accordion>
    );
};

export default HotelList;
