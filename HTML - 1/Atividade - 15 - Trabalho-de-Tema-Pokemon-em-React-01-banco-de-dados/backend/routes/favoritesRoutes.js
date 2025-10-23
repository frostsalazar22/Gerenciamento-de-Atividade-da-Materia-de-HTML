const express = require('express');
const { addFavorite, removeFavorite } = require('../controllers/favoritesController');
const { protect } = require('../utils/auth');

const router = express.Router();

router.post('/', protect, addFavorite);
router.delete('/:id', protect, removeFavorite);

module.exports = router;
