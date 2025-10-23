import 'package:flutter/material.dart';
import '../molecules/city_header.dart';
import '../molecules/weather_info.dart';

class WeatherCard extends StatefulWidget {
  final String city;
  final String temperature;
  final IconData icon;

  const WeatherCard({
    super.key,
    required this.city,
    required this.temperature,
    required this.icon,
  });

  @override
  State<WeatherCard> createState() => _WeatherCardState();
}

class _WeatherCardState extends State<WeatherCard> {
  double _scale = 1.0;

  void _onTapDown(TapDownDetails details) {
    setState(() {
      _scale = 0.50; // Leve redução no toque
    });
  }

  void _onTapUp(TapUpDetails details) {
    setState(() {
      _scale = 1.0; // Volta ao tamanho normal
    });
  }

  void _onTapCancel() {
    setState(() {
      _scale = 1.0;
    });
  }

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTapDown: _onTapDown,
      onTapUp: _onTapUp,
      onTapCancel: _onTapCancel,
      onTap: () {
        // Aqui podemos adicionar navegação para outra tela futuramente
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Você clicou em ${widget.city}')),
        );
      },
      child: AnimatedScale(
        scale: _scale,
        duration: const Duration(milliseconds: 150),
        curve: Curves.easeInOut,
        child: Card(
          margin: const EdgeInsets.all(12),
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
          elevation: 4,
          child: Padding(
            padding: const EdgeInsets.all(16),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                CityHeader(city: widget.city),
                const SizedBox(height: 8),
                WeatherInfo(icon: widget.icon, temperature: widget.temperature),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
