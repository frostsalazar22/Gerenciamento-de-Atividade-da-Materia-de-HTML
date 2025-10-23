import React, { useEffect, useState } from 'react';
import { IconButton } from '@mui/material';
import { Menu as MenuIcon, ModeNight as ModeNightIcon } from '@mui/icons-material';
import { Link, useNavigate } from 'react-router-dom';
import { auth } from "../../services/firebase";
import './Header.css';

const Header = ({ setSearchTerm, setSelectedGeneration, toggleSidebar, toggleDarkMode }) => {
  const [user, setUser] = useState(null);
  const navigate = useNavigate();

  useEffect(() => {
    const unsubscribe = auth.onAuthStateChanged(setUser);
    return unsubscribe;
  }, []);

  const handleLogout = async () => {
    try {
      await auth.signOut();
      navigate('/login');
    } catch (error) {
      console.error("Erro ao sair:", error.message);
    }
  };

  return (
    <header className="header">
      <div className="search-container">
        <IconButton size="large" edge="start" color="inherit" onClick={toggleSidebar}>
          <MenuIcon />
        </IconButton>
        <form className="search-form" onSubmit={e => e.preventDefault()}>
          <input type="text" placeholder="Nome do Pokémon" onChange={e => setSearchTerm(e.target.value)} />
        </form>
        <nav>
          <ul>
            <li><Link to="/">Início</Link></li>
            <li className="dropdown">
              <Link to="#">Geração</Link>
              <div className="dropdown-content">
                {Array.from({ length: 9 }, (_, i) => (
                  <Link key={i + 1} onClick={() => setSelectedGeneration(i + 1)}>Geração {i + 1}</Link>
                ))}
              </div>
            </li>
          </ul>
        </nav>
        <IconButton size="large" color="inherit" onClick={toggleDarkMode}>
          <ModeNightIcon />
        </IconButton>
        <div className="auth-links">
          {user ? (
            <>
              <Link to="/favorites">Meus Favoritos</Link>
              <button onClick={handleLogout}>Sair</button>
            </>
          ) : (
            <>
              <Link to="/login">Login</Link>
              <Link to="/register">Cadastrar-se</Link>
            </>
          )}
        </div>
      </div>
    </header>
  );
};

export default Header;
