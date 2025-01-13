import React, { useState } from 'react';
import HotelList from './components/HotelList';
import HotelForm from './components/HotelForm';

const App = () => {
    const [hoteles, setHoteles] = useState([]);

    const handleSaveHotel = (hotel) => {
        setHoteles([...hoteles, hotel]);
    };

    return (
        <div className="container">
            <h1 className="text-center my-4">Gestión de Hoteles</h1>
            <div className="row">
                <div className="col-md-6">
                    <HotelForm onSave={handleSaveHotel} />
                </div>
                <div className="col-md-6">
                    <HotelList hoteles={hoteles} />
                </div>
            </div>
        </div>
    );
};

export default App;
