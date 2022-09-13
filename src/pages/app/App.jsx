import logo from './logo.svg';
import './App.css';
import React, { useContext } from 'react';
import { AuthContext } from '../../contexts';

export const App = () => {
  const { user } = useContext(AuthContext);

  return (
    <div className="App">
     <div className= 'App-header'
         style={{   backgroundImage: `url(${"https://www.elheraldodesaltillo.mx/wp-content/uploads/2020/04/la-sana-distancia.jpg"})`, 
         opacity: 2,backgroundRepeat: "no-repeat" }} >

        
      <header className='App-header' >
        <img style={{
    width: 130,
    height: 130,
    resizeMode: "contain",
    alignSelf: "center",
 
    borderRadius: 20,
  }} 
  src="https://scontent.fuio10-1.fna.fbcdn.net/v/t1.15752-9/304837802_648826329799440_5638148707732714111_n.png?_nc_cat=104&ccb=1-7&_nc_sid=ae9488&_nc_ohc=gqH1dEzZ7pwAX9IBKYp&_nc_ht=scontent.fuio10-1.fna&oh=03_AVIoy-uar3Am7i-wpfzN7F4yw0P7E0m8umwco17E-mdZyw&oe=63451C29"  />
        <h1 className='text-4xl font-bold'>Portal de sistema penitenciario</h1>
        <h2 className='text-2xl font-bold'>Bienvenido {user.full_name}</h2>
      </header>
      </div>
    </div>
  );
}