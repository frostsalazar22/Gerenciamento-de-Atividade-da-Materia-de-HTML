const mongoose = require('mongoose');

const favoriteSchema = new mongoose.Schema({
  userId: { type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true },
  pokemonId: { type: Number, required: true },
  pokemonName: { type: String, required: true },
  pokemonidimg: { type: img, required: true },
});

module.exports = mongoose.model('Favorite', favoriteSchema);
