import React from 'react';
import { Link, useParams } from 'react-router-dom';
import { useEffect, useState } from 'react';
import axios from 'axios';

export const ShowReport = () => {
    const { id } = useParams();
    const [report, setReport] = useState({});
    const token = localStorage.getItem('token');

    useEffect(() => {
        const getReport= async () => {
            try {
                const response = await axios.get(
                    `https://proyecto--backend.herokuapp.com/api/v1/report/${id}`,
                    { headers: { 'accept': 'application/json', 'authorization': token } }
                )
                const report = { ...response.data.data.report, id }
                setReport(report);
            } catch (error) {
                console.log(error);
            }
        }
        getReport()
    }, [])

    return (
        <div>
            <h1 className='font-black text-4xl text-sky-900'>Reporte</h1>
            <hr className='mt-3' />
            <p className='mt-3'>Detalles del reporte</p>
            {
                Object.keys(report).length > 0 ?
                    (
                        <div className='m-5 flex justify-between'>
                            <div>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Titulo: </span>
                                    {report.title}
                                </p>
                                <p className="text-2xl text-gray-00 mt-4">
                                    <span className="text-gray-600 uppercase font-bold">* Descripción: </span>
                                    {report.description}
                                </p>
                                <br></br>
                                <div >
                                    <button type="button"  className="text-white text-2xl block mt-4 hover:text-red-300 text-center bg-red-900 p-1 rounded-lg" >
                                    <Link to='/reports'>
                                        Regresar
                                    </Link>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <img src="https://cdn-icons-png.flaticon.com/512/4838/4838646.png" alt="reportes" className='h-40 w-60' />
                            </div>
                        </div>
                        

                    )
                    :
                    (
                        <p className="bg-yellow-600 border-t border-b border-yellow-900 text-white px-4 py-3 m-5 text-center rounded-lg">No existen datos para este reporte</p>
                    )
            }
        </div>
    )
}
