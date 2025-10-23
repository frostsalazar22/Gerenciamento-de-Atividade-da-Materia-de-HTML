const express = require('express');
const cors = require('cors');
const connectDatabase = require('./config/database');
const authRoutes = require('./routes/authRoutes');
const favoritesRoutes = require('./routes/favoritesRoutes');

require('dotenv').config();
connectDatabase();

const app = express();
app.use(cors());
app.use(express.json());

app.use('/api/auth', authRoutes);
app.use('/api/favorites', favoritesRoutes);

module.exports = app;
