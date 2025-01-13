import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import axios from 'axios';
import HotelList from '../components/HotelList';

const HotelListPage = () => {
    const [hotels, setHotels] = useState([]);
    const history = useHistory();

    useEffect(() => {
        axios.get('http://localhost:8000/api/hotels')
            .then(response => setHotels(response.data))
            .catch(error => console.error('Error fetching hotels:', error));
    }, []);

    const handleEdit = id => {
        history.push(`/edit/${id}`);
    };

    const handleDelete = id => {
        axios.delete(`http://localhost:8000/api/hotels/${id}`)
            .then(() => setHotels(prevHotels => prevHotels.filter(hotel => hotel.id !== id)))
            .catch(error => console.error('Error deleting hotel:', error));
    };

    return (
        <div>
            <h1>Lista de Hoteles</h1>
            <HotelList hotels={hotels} onEdit={handleEdit} onDelete={handleDelete} />
        </div>
    );
};

export default HotelListPage;
