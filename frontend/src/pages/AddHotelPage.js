import React from 'react';
import { useHistory } from 'react-router-dom';
import axios from 'axios';
import HotelForm from '../components/HotelForm';

const AddHotelPage = () => {
    const history = useHistory();

    const handleFormSubmit = hotel => {
        axios.post('http://localhost:8000/api/hotels', hotel)
            .then(() => history.push('/'))
            .catch(error => console.error('Error creating hotel:', error));
    };

    return (
        <div>
            <h1>Agregar Nuevo Hotel</h1>
            <HotelForm onFormSubmit={handleFormSubmit} />
        </div>
    );
};

export default AddHotelPage;
