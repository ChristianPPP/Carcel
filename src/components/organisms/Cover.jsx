import React from 'react';
import { Link } from 'react-router-dom'
import { ShieldIcon } from '../atoms'

export const Cover = () => {
  return (
    <>
      {/* <div className='hidden md:flex justify-center items-center min-h-screen bg-gradient-to-r from-cyan-500 to-violet-500'
      styles="backgroundImage: url('https://www.elpaccto.eu/wp-content/uploads/2021/03/silueta-de-prision-scaled.jpg'); width: 100%; height: 100vh; ">
         */}
         <div className='hidden md:flex justify-center items-center min-h-screen bg-gradient-to-r from-cyan-500 to-violet-500'
         style={{ backgroundImage: `url(${"https://cdn.forbes.com.mx/2015/07/reuters-altiplano-carcel.jpg"})`, 
         backgroundRepeat: "no-repeat"}} >
        <div className='text-center text-white space-y-3 p-8'>
          <Link to="/">
            <ShieldIcon styles='w-40 h-40 mx-auto' />
          </Link>
          <h2 className='text-3xl font-extrabold'>Sistema Penitenciario</h2>
          <p className='text-base'>Sistema web para el manejo de centro penitenciario</p>
        </div>
      </div>
    </>
  )
}
