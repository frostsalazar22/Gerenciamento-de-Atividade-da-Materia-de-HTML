const axios = require('axios');

exports.getPokemonData = async (pokemonId) => {
  try {
    const response = await axios.get(`https://pokeapi.co/api/v2/pokemon/${pokemonId}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching Pokémon data:', error);
    throw new Error('Failed to fetch Pokémon data');
  }
};
