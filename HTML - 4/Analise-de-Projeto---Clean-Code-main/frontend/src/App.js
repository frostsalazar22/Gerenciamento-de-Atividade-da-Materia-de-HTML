import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router } from 'react-router-dom';
import './App.css';
import Header from './components/Header/Header';
import Filters from './components/Filters/Filters';
import Footer from './components/Footer/Footer';
import Sidebar from './components/Sidebar/Sidebar';
import { fetchPokemons } from './services/pokeApi';
import AppRoutes from './routes/Routes';
import { useDarkMode, filterPokemons } from './hooks';
import './acessibilidade/darkMode.css';

function App() {
  const [pokemons, setPokemons] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [selectedTypes, setSelectedTypes] = useState([]);
  const [selectedGeneration, setSelectedGeneration] = useState(null);
  const [loading, setLoading] = useState(true);
  const [isSidebarOpen, setIsSidebarOpen] = useState(false);

  const { darkMode, toggleDarkMode } = useDarkMode();

  useEffect(() => {
    fetchPokemons().then(data => {
      setPokemons(data);
      setLoading(false);
    });
  }, []);

  const filteredPokemons = filterPokemons(pokemons, searchTerm, selectedTypes, selectedGeneration);

  const toggleType = (type) => {
    setSelectedTypes(prevTypes => prevTypes.includes(type) ? prevTypes.filter(t => t !== type) : [...prevTypes, type]);
  };

  return (
    <Router>
      <div className={`App ${darkMode ? 'dark-mode' : ''}`}>
        <Header 
          setSearchTerm={setSearchTerm} 
          setSelectedGeneration={setSelectedGeneration} 
          toggleSidebar={() => setIsSidebarOpen(!isSidebarOpen)}
          toggleDarkMode={toggleDarkMode}
        />
        <Sidebar 
          isOpen={isSidebarOpen} 
          closeSidebar={() => setIsSidebarOpen(false)} 
          types={filteredPokemons.types} 
          selectedTypes={selectedTypes} 
          toggleType={toggleType} 
        />
        <Filters selectedTypes={selectedTypes} setSelectedTypes={setSelectedTypes} />
        <AppRoutes loading={loading} filteredPokemons={filteredPokemons} />
        <Footer />
      </div>
    </Router>
  );
}

export default App;
