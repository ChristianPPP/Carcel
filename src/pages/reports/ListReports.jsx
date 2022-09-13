import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

export const ListReports = () => {

  const navigate = useNavigate();
  const [reports, setReports] = useState([]);
  const token = localStorage.getItem('token');


  const getReports = async () => {
    try {
      const response = await axios.get(
        'https://proyecto--backend.herokuapp.com/api/v1/report',
        { headers: { 'accept': 'application/json', 'authorization': token } }
      );
      console.log(response.data.data.reports)
      setReports(response.data.data.reports)
    } catch (error) {
      console.log(error);
    }
  }

  const deleteReport = async (id) => {
    try {
      console.warn(id);
      // eslint-disable-next-line no-restricted-globals
      const confirmation = confirm("Are you sure?")
      if (confirmation) {
        await axios.get(
          `https://proyecto--backend.herokuapp.com/api/v1/report/${id}/destroy`,
          { headers: { 'accept': 'application/json', 'authorization': token } }
        );
        await getReports();
      }
    }
    catch (error) {
      console.log(error);
    }
  }


  useEffect(() => {
    getReports();
  }, [])

  return (
    <div>
      <h1 className='font-black text-4xl text-sky-900'>Reportes</h1>
      <hr className='mt-3' />
      <p className='mt-3'>Lista de reportes creados</p>

      <table className='w-full mt-5 table-auto shadow bg-white'>
        <thead className='bg-sky-900 text-white'>
          <tr>
            <th className='p-2'>#</th>
            <th className='p-2'>Titulo</th>
            <th className='p-2'>Descripción</th>
            <th className='p-2'>Estado</th>
            <th className='p-2'>Opciones</th>
            <td className='p-2'></td>
          </tr>
        </thead>
        <tbody>
          {
            reports.map((report, index) => (
              <tr key={report.id} className="border-b hover:bg-gray-100">
                <td className='p-3'>{++index}</td>
                <td className='p-3'>{report.title}</td>
                <td className='p-3'>{report.description}</td>
                <td className='p-3'>{report.state ? <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6 text-green-900 font-bold">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
                  :
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6 text-red-900 font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                  </svg>
                }</td>
                <td className='p-3'>
                  <button type='button' className='bg-sky-800 block w-full text-white p-2 uppercase font-bold text-xs rounded-xl'
                    onClick={() => navigate(`/reports/show/${report.id}`)}>Ver</button>
                  <button type='button' className='bg-cyan-900 block w-full text-white p-2 uppercase font-bold text-xs mt-2 mb-2 rounded-xl'
                    onClick={() => navigate(`/reports/edit/${report.id}`)}>Editar</button>
                  
                  <button type='button' className={`${report.state ? 'bg-red-800' : 'bg-green-800 '} block w-full text-white p-2 uppercase font-bold text-xs rounded-xl`}
                    onClick={() => { deleteReport(report.id) }}>{report.state ? 'Inactive' : 'Active'}</button>
                </td>
              </tr>
            ))
          }
        </tbody>
      </table>
    </div>
  );
}
