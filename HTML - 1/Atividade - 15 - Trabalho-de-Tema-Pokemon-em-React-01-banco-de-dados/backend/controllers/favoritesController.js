const Favorite = require('../models/Favorite');

exports.addFavorite = async (req, res) => {
  try {
    const { pokemonId, pokemonName } = req.body;
    const favorite = await Favorite.create({ userId: req.user.id, pokemonId, pokemonName });
    res.status(201).json(favorite);
  } catch (error) {
    res.status(400).json({ error: 'Failed to add favorite' });
  }
};

exports.removeFavorite = async (req, res) => {
  try {
    const { id } = req.params;
    await Favorite.findByIdAndDelete(id);
    res.json({ message: 'Favorite removed successfully' });
  } catch (error) {
    res.status(500).json({ error: 'Failed to remove favorite' });
  }
};
