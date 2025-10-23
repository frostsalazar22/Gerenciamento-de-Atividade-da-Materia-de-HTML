import { useState, useEffect } from 'react';

// Hook customizado para modo escuro
export function useDarkMode() {
  const [darkMode, setDarkMode] = useState(false);

  const toggleDarkMode = () => setDarkMode(!darkMode);

  return { darkMode, toggleDarkMode };
}

// Função para filtrar Pokémon com base nos critérios
export function filterPokemons(pokemons, searchTerm, selectedTypes, selectedGeneration) {
  return pokemons.filter(pokemon => {
    const matchesSearch = pokemon.name.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesType = selectedTypes.length === 0 || selectedTypes.some(type => pokemon.types.includes(type));
    const matchesGeneration = selectedGeneration === null || pokemon.generation === selectedGeneration;

    return matchesSearch && matchesType && matchesGeneration;
  });
}
