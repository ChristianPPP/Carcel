import React from 'react';
import { Link, useParams } from 'react-router-dom';
import { useEffect, useState } from 'react';
import axios from 'axios';

export const ShowDirector = () => {
    const { id } = useParams();
    const [director, setDirector] = useState({});
    const token = localStorage.getItem('token');

    useEffect(() => {
        const getDirector = async () => {
            try {
                const response = await axios.get(
                    `https://proyecto--backend.herokuapp.com/api/v1/director/${id}`,
                    { headers: { 'accept': 'application/json', 'authorization': token } }
                )
                const user = { ...response.data.data.user, id }
                setDirector(user);
            } catch (error) {
                console.log(error);
            }
        }
        getDirector()
    }, [])

    return (
        <div>
            <h1 className='font-black text-4xl text-sky-900'>Director</h1>
            <hr className='mt-3' />
            <p className='mt-3'>Detalle de director</p>
            {
                Object.keys(director).length > 0 ?
                    (
                        <div className='m-5 flex justify-between'>
                            <div>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Primer nombre: </span>
                                    {director.first_name}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Apellido: </span>
                                    {director.last_name}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Correo electrónico: </span>
                                    {director.email}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Número celular: </span>
                                    {director.phone_number}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Estado: </span>
                                    {director.state ? 'Activo' : 'Inactivo'}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Fecha de cumpleaños: </span>
                                    {director.birthdate ? director.birthdate : 'N/A'}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Número telefónico: </span>
                                    {director.home_phone_number ? director.home_phone_number : 'N/A'}
                                </p>
                                <br></br>
                                <div >
                                    <button type="button"  className="text-white text-2xl block mt-4 hover:text-red-300 text-center bg-red-900 p-1 rounded-lg" >
                                    <Link to='/directors'>
                                        Regresar
                                    </Link>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149995.png" alt="avatar" className='h-80 w-80' />
                            </div>
                        </div>
                    )
                    :
                    (
                        <p className="bg-yellow-600 border-t border-b border-yellow-900 text-white px-4 py-3 m-5 text-center rounded-lg">No existen datos registrados para este director</p>
                    )
            }
        </div>
    )
}
